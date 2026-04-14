<?php
namespace Custom_Data;

/////////////////////////////////////////////////////custom posts
class Post {
 
    public function __construct($init) {
        $this->settings = $init;
        add_action( 'init', array(&$this, 'add_custom_post_type') );
    }
 
    public function add_custom_post_type() {
        
      $slug = $this->settings['slug'];
      $singleName = $this->settings['name'];
      $pluralName = $this->settings['pluralName'];
      
      $isPublic = (isset($this->settings['isPublic'])) ? $this->settings['isPublic'] : true;
      

      $hasArchive = true;
      // if(isset($this->settings['hasArchive'] ) == true){
      //   $hasArchive = $this->settings['hasArchive'];
      // }
    
      $supports = array('title');
      if(isset($this->settings['supports'])){
        $supports = $this->settings['supports'];
      }

      $hasImage = (isset($this->settings['hasImage'])) ? $this->settings['hasImage'] : false;
      if($hasImage){
        array_push($supports, 'thumbnail'); 
      }


      $tax = array();
      $hasTax = (isset($this->settings['hasCategories'])) ? $this->settings['hasCategories'] : false;
      if($hasTax){
        $title = 'category_'.$slug;
        $tax = array($slug);
        $this->setTaxonomy($title,$slug);
      }

      
      $isRestricted = (isset($this->settings['isRestricted'])) ? $this->settings['isRestricted'] : false;
      $cap = 'post';
      if($isRestricted){
        $cap = array('admin','admins');
      }

      
      $pageName = 'mnr';
      $labels = array(
          'name'                => _x( $pluralName, 'Post Type General Name', $pageName ),
          'singular_name'       => _x( $singleName, 'Post Type Singular Name', $pageName ),
          'menu_name'           => __( $pluralName, $pageName ),
          'parent_item_colon'   => __( 'Parent '.$singleName, $pageName ),
          'all_items'           => __( 'All '.$pluralName, $pageName ),
          'view_item'           => __( 'View '.$singleName, $pageName ),
          'add_new_item'        => __( 'Add New '.$singleName, $pageName ),
          'add_new'             => __( 'Add New '.$singleName, $pageName ),
          'edit_item'           => __( 'Edit '.$singleName, $pageName ),
          'update_item'         => __( 'Update '.$singleName, $pageName ),
          'search_items'        => __( 'Search '.$singleName, $pageName ),
          'not_found'           => __( 'Not Found', $pageName ),
          'not_found_in_trash'  => __( 'Not found in Trash', $pageName ),
      );
      // Set other options for Custom Post Type
      $args = array(
          'label'               => __( $pluralName, $pageName ),
          'description'         => __( $pluralName, $pageName ),
          'labels'              => $labels,
          'supports'            => $supports,
          'taxonomies'          => $tax,
          'hierarchical'        => false,
          'public'              => $isPublic,
          'show_in_rest'        => $isPublic,
          'query_var'           => true,
          'rest_base'           => $slug,
          'rest_controller_class' => 'WP_REST_Posts_Controller',
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => $hasArchive,
          'exclude_from_search' => !$isPublic,
          'publicly_queryable'  => $isPublic,
          'capability_type'     => $cap,
          // 'rewrite' => array('slug' => $slug),
      );

      register_post_type( $slug, $args );
    }

    public function setTaxonomy($title,$post){
      register_taxonomy($title,array($post), array(
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => $title ),
      )); 
    }
}
class Post_Meta_Box {
    
    public function __construct($init) {
        $this->settings = $init;
        if ($this->settings['type'] == "textarea-mce") {
            add_action('edit_form_advanced', array($this, 'render_tinymce_editor'));
        } else {
          add_action( 'add_meta_boxes', array( $this, 'add_box' ) );
        }
        add_action( 'save_post',      array( $this, 'save'  ), 10, 2 );
    }
 
    public function add_box() {
       
        $call = (isset($this->settings['callback'])) ? 
                   $this->settings['callback'] : 
                   array( $this, 'render_meta_box_content' );

        add_meta_box(
            $this->settings['id'],
            $this->settings['title'],
            $call,
            $this->settings['post'],
            'normal',
            'high'
        );
    }
 
    public function save($post_id, $post) {
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;


        // if ( isset($_POST[ 'post_type' ]) && 'shop_order' == $_POST[ 'post_type' ] )
        //   return $post_id;

         // if our nonce isn't there, or we can't verify it, bail
        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;


        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_post', $post_id ) ) return;


        $allowed_protocols = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
          'b' => array(),
          'ul' => array(),
          'ol' => array(),
          'li' => array(),
          'p' => array(),
          'h1' => array(),
          'h2' => array(),
          'h3' => array(),
          'h4' => array(),
          'h5' => array(),
          'h6' => array(),
          'img' => array(
               'src' => array(),
               'alt' => array(),
               'width' => array(),
               'height' => array(),
               'class' => array(),
               'id' => array(),
           ),
          'div' => array(
               'class' => array(),
               'id' => array(),
               'data' => array(),
           ),
           'textarea' => array(
               'class' => array(),
               'id' => array(),
               'data' => array(),
           ),
        );
        

        if( isset( $_POST[$this->settings['id']] ) ) {
          if($this->settings['type'] && 
             ($this->settings['type'] == "textarea-html" || $this->settings['type'] == "textarea-mce") ){
            $mydata = $_POST[$this->settings['id']];
          }
          else{
            $mydata = sanitize_text_field( $_POST[$this->settings['id']] );
          }
          update_post_meta( $post_id, $this->settings['id'], wp_kses($mydata,$allowed_protocols) );
        }
    }
 
    public function render_meta_box_content( $post ) {
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

        $value = get_post_meta( $post->ID, $this->settings['id'], true );
        
        if($this->settings['type'] == "textarea"){
        ?>
           <textarea name="<?= $this->settings['id']; ?>" 
                     style="width: 100%; min-height: 200px;" 
                     class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                     data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                     ><?= $value; ?></textarea>
        <?php
        } 
        else if($this->settings['type'] == "json"){
        ?>
           <textarea name="<?= $this->settings['id']; ?>" 
                     style="width: 100%; min-height: 200px;" 
                     class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                     data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                     ><?= $value; ?></textarea>
        <?php
        } 
        else if($this->settings['type'] == "textarea-html"){
        ?>
           <textarea name="<?= $this->settings['id']; ?>" 
                     style="width: 100%; min-height: 200px;" 
                     class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                     data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                     ><?= htmlentities($value); ?></textarea>
        <?php
        } 
        else if($this->settings['type'] == "gallery"){
          $gallery = $value;
          $html    = '<div id="mb-vista-previa-gallery">';
          if ( ! empty( $gallery ) ) {
              // El campo galería almacena los IDs de las imágenes separados por comas
              // Utiliza explode para obtener un array de IDs.
              $gallery_ids = explode( ',', $gallery );
              foreach ( $gallery_ids as $attachment_id ) {
                  $img   = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
                  $html .= '<img class="mb-miniatura-gallery" src="';
                  $html .= esc_url( $img[0] ) . '">';
              }
          }
          $html .= '</div>';
          $html .= '<input name="'.$this->settings['id'].'" id="ids_gallery" style="width: 100%; " value="';
          $html .= esc_attr( $gallery ) . '" >';
          $html .= '<div id="mb-botonera-gallery">';
          $html .= '<input id="boton_crear_gallery" class="button" type="button" value="Crear/editar galería" >';
          $html .= '<input id="boton_eliminar_gallery" class="button" type="button" value="Eliminar galería" >';
          $html .= '</div>';

          
          ?>
              <script>
                jQuery(document).ready(function($){
                  var meta_gallery_frame;
               
                  $( '#boton_crear_gallery' ).click(function(e) {
                      e.preventDefault();
                      // Si el frame existe abre la modal.
                      console.log(meta_gallery_frame);
                      if ( meta_gallery_frame ) {
                          meta_gallery_frame.open();
                          return;
                      }
                      // Si no hay valores crea una galería de cero, si los hay edita la actual.
                      var ids_gallery = $( '#ids_gallery' ).val();
                      if ( !( ids_gallery ) ) {
                          // Crea un nuevo frame de tipo galería
                          meta_gallery_frame = wp.media.frames.wp_media_frame = wp.media( {
                              title: 'Galería de fotos',
                              frame: "post",
                              state: 'gallery-library',
                              library: {
                                  type: 'image'
                              },
                              multiple: true
                          } );
                          // Abre la modal con el frame
                          meta_gallery_frame.open();
                      } else {
                          // Abre la modal con el frame y con los attachment de la galería cargados
                          // meta_gallery_frame = wp.media.gallery.edit();
                          meta_gallery_frame = wp.media.frames.wp_media_frame = wp.media( {
                              title: 'Galería de fotos',
                              frame: "post",
                              state: 'gallery-library',
                              library: {
                                  type: 'image'
                              },
                              multiple: true
                          } );
                          // Abre la modal con el frame
                          meta_gallery_frame.open();
                      }
                      // Cuando se actualice la galería, pulsando el botón correspondiente de la modal, 
                      // actualiza las miniaturas y los valores que se guardarán en el input oculto.
                      meta_gallery_frame?.on("update", function(selection) {
                          var $vista_previa = $( '#mb-vista-previa-gallery' )
                          $vista_previa.html( '' );
                          // La función map itera sobre selection.models, crea el código html y devuelve los ids.
                          var ids = selection.models.map(
                              function( e ) {
                                  elemento = e.toJSON();
                                  imagen_url = typeof elemento?.sizes?.thumbnail !== 'undefined' ? 
                                                      elemento?.sizes?.thumbnail?.url : elemento.url;
                                  html = "<div class='mb-miniatura-gallery'><img src='" + imagen_url + "'></div>";
                                  $vista_previa.append( html );
                                  return e.id;
                              }
                          );
                          $( '#ids_gallery' ).val( ids.join( ',' ) ).trigger( 'change' );
                      });
                  });
               
                  $('#boton_eliminar_gallery').click(function(e) {
                      e.preventDefault();
                      // Elimina los ids del input.
                      $( '#ids_gallery' ).val( '' ).trigger( 'change' );
                      // Elimina las miniaturas.
                      $( '#mb-vista-previa-gallery' ).html( '' );
                      return;
                  });
               
                });
              </script>
              <style>
                #mb-vista-previa-gallery {
                    padding: 1em;
                }
                .mb-miniatura-gallery {
                    float: left;
                    width: 150px;
                    height: 150px;
                    object-fit: contain;
                }
                .mb-miniatura-gallery img{
                  width: 100%;
                  height: 100%;
                  object-fit: contain;
                }
                #mb-botonera-gallery {
                    clear: both;
                    padding: 1em;
                }
              </style>
          <?php
          // wp_nonce_field( 'graba_gallery', 'gallery_nonce' );
          echo $html;
        }
        else if($this->settings['type'] == "bool"){
        ?> 
           <select name="<?= $this->settings['id']; ?>" 
                  style="width:100%;" 
                  class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  >
                  <option value="false" 
                         <?php if($value == 'false') echo 'selected'; ?> >
                  false</option>
                  <option value="true"  
                         <?php if($value == 'true') echo 'selected'; ?> >
                  true</option>
                  
            </select>
        <?php
        }
        else if($this->settings['type'] == "select"){
        ?> 
           <select name="<?= $this->settings['id']; ?>" 
                  style="width:100%;" 
                  class="regular-text <?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  >
                  <option value="" >select an option</option>
                  <?php 
                   if(isset($this->settings['options'])){
                     foreach ($this->settings['options'] as $key => $val) {
                       ?>
                          <option value="<?= $val[0] ?>" 
                                  <?php if($value == $val[0]){echo 'selected';} ?> >
                           <?= $val[1]; ?></option>
                       <?php
                     }
                   }
                  ?>
                  
            </select>
        <?php
        }
        else if($this->settings['type'] == "select-post"){
        ?> 
           <select name="<?= $this->settings['id']; ?>" 
                  style="width:100%;" 
                  class="regular-text <?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  >
                  <option value="" >select an option</option>
                  <?php 
                   $args = array(
                      'posts_per_page' => -1,
                      'post_status'    => 'publish',
                      'orderby'        => 'date',
                      'order'          => 'DESC',
                      'fields'         => 'ids',
                      'post_type'      => (isset($this->settings['selectType']))? 
                                                 $this->settings['selectType'] : 'posts'
                   );
                   $tempPosts = get_posts($args);
                   if(count($tempPosts) > 0){
                     foreach ($tempPosts as $key => $post) {
                       ?>
                          <option value="<?= $post ?>" 
                                  <?php if($value == $post){echo 'selected';} ?> >
                           <?= get_the_title($post); ?></option>
                       <?php
                     }
                   }
                  ?>
                  
            </select>
        <?php
        }
        else {
        ?>
           <input name="<?= $this->settings['id']; ?>" 
                  style="width:100%;" 
                  class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  type="<?= (isset($this->settings['type']))? $this->settings['type']:'text'; ?>"
                  value="<?= $value; ?>">
        <?php
        }
        
        ?>
          <p style="font-size:12px"><?= '<strong>box id: </strong>'. $this->settings['id']; ?></p>
        <?php
    }
    public function render_tinymce_editor() {
        global $post;
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        $value = get_post_meta($post->ID, $this->settings['id'], true);
        ?>
        <div class="mceHolder" style="width: 100%;">
            <?php
            wp_editor(html_entity_decode($value), $this->settings['id'], array(
                'textarea_name' => $this->settings['id'],
                'textarea_rows' => (isset($this->settings['textareaRows'])) ? $this->settings['textareaRows'] : 10,
                'media_buttons' => (isset($this->settings['textareaMedia'])) ? $this->settings['textareaMedia'] : true,
                'quicktags' => (isset($this->settings['textareaQuickTags'])) ? $this->settings['textareaQuickTags'] : true,
                'tinymce' => (isset($this->settings['textareaTinyMce'])) ? $this->settings['textareaTinyMce'] : true
            ));
            ?>
        </div>
        <p style="font-size:12px; margin-bottom: 40px;"><?= '<strong>box id: </strong>'. $this->settings['id']; ?></p>
        <?php
    }
}


//////////////////////////////////////////////////////user
class User_Meta_Box {
    private $settings;
    public function __construct($init) {
        // add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        // add_action( 'save_post',      array( $this, 'save'  ), 10, 2 );
        

        add_action( 'edit_user_profile', array( $this, 'render_meta_box_content' ) );
        add_action( 'show_user_profile', array( $this, 'render_meta_box_content' ) );

        add_action( 'edit_user_profile_update', array( $this, 'save'  ) );
        add_action( 'personal_options_update', array( $this, 'save'  ));


        $this->settings = $init;

    }
 
 
    public function save($user_id) {
        // Bail if we're doing an auto save
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;


         // if our nonce isn't there, or we can't verify it, bail
        if( !isset( $_POST['meta_box_nonce-'.$this->settings['id']] ) || 
            !wp_verify_nonce( $_POST['meta_box_nonce-'.$this->settings['id']], 'my_meta_box_nonce-'.$this->settings['id'] ) ) return;


        // if our current user can't edit this post, bail
        if( !current_user_can( 'edit_user', $user_id ) ) return;


        $allowed_protocols = array(
          'a' => array(
              'href' => array(),
              'title' => array()
          ),
          'br' => array(),
          'em' => array(),
          'strong' => array(),
          'ul' => array(),
          'li' => array(),
          'img' => array(
               'src' => array(),
               'alt' => array(),
               'width' => array(),
               'height' => array(),
               'class' => array(),
               'id' => array(),
           ),
          'div' => array(
               'class' => array(),
               'id' => array(),
               'data' => array(),
           ),
           'textarea' => array(
               'class' => array(),
               'id' => array(),
               'data' => array(),
           ),
        );


        

        if( isset( $_POST[$this->settings['id']] ) ) {
          if(isset($_POST[$this->settings['type']]) && $_POST[$this->settings['type']] == "textarea-html"){
            $mydata = $_POST[$this->settings['id']];
          }
          else{
            $mydata = sanitize_text_field( $_POST[$this->settings['id']] );
          }
          update_user_meta( $user_id, $this->settings['id'], wp_kses($mydata,$allowed_protocols) );
        }
    }
 
    public function render_meta_box_content( $user ) {
        wp_nonce_field( 'my_meta_box_nonce-'.$this->settings['id'], 'meta_box_nonce-'.$this->settings['id'] );

        $value = get_user_meta( $user->ID, $this->settings['id'], true );

        ?>

        <table class="form-table" >
          <tbody>


           <tr>
             <th><label><?= $this->settings['title']; ?></label></th>
             <td>
           

        <?php
        
        if($this->settings['type'] == "textarea"){
        ?>
           <textarea name="<?= $this->settings['id']; ?>" 
                     rows="5" cols="30"
                     class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                     data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                     ><?= $value; ?></textarea>
        <?php
        } 
        else if($this->settings['type'] == "textarea-html"){
        ?>
           <textarea name="<?= $this->settings['id']; ?>" 
                     rows="5" cols="30"
                     class="<?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                     data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                     ><?= htmlentities($value); ?></textarea>
        <?php
        } 
        else if($this->settings['type'] == "bool"){
        ?> 
           <select name="<?= $this->settings['id']; ?>" 
                  class="regular-text <?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  >
                  <option value="false" 
                         <?php if($value == 'false') echo 'selected'; ?> >
                  false</option>
                  <option value="true"  
                         <?php if($value == 'true') echo 'selected'; ?> >
                  true</option>
                  
            </select>
        <?php
        }
        else if($this->settings['type'] == "select"){
        ?> 
           <select name="<?= $this->settings['id']; ?>" 
                  class="regular-text <?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  >
                  <option value="" >select an option</option>
                  <?php 
                   if(isset($this->settings['options'])){
                     foreach ($this->settings['options'] as $key => $val) {
                       ?>
                          <option value="<?= $val[0] ?>" <?= ($value == $val[0])? 'selected' : ''; ?> >
                           <?= $val[1]; ?></option>
                       <?php
                     }
                   }
                  ?>
                  
            </select>
        <?php
        }
        else {
        ?>
           <input name="<?= $this->settings['id']; ?>"
                  type="text"
                  class="regular-text <?= (isset($this->settings['class']))? $this->settings['class']:''; ?>"
                  data-custom="<?= (isset($this->settings['attribute']))? $this->settings['attribute']:''; ?>"
                  value="<?= $value; ?>">
        <?php
        }
        

        ?>
          </td>
          </tr>
          </tbody>
        </table>

        <?php
    }
}




?>