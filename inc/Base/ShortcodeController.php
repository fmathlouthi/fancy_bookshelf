<?php
/**
 * @package fancy_bookshelf
 */
namespace Inc\Base;

use Inc\Base;

class ShortcodeController extends BaseController
{   
    /**
     * Regsiter shortcode 
     */
    public function register()
    {
       add_action(
           'init',
            array($this, 'register_shortcode') 
       );
    }
    /**
     * [book] shortcode
     */
    public function register_shortcode(){
        add_shortcode(
            'book', //unique id
            array($this, 'book_info_page') //callback function
        );
        
    }
    /**
     * it will call bookviewpage for shortcode 
     */
    public function book_info_page($atts)
    {   
       
        $atts= shortcode_atts(array(
                'post_type'=>'book',
                'id'=>'no id',
                'publisher'=>"no publisher"
        ),$atts);
        
        $args = array(
            'post_type' => 'book',
            'p'=>$atts['id'],
            'tax_query' => array(
                array(
                  'taxonomy' => 'gener',
                  'field' => 'id',
                //   'terms' => 'dgit'
                )
            )
           
        );
        $args2 = array(
            'post_type' => 'book',
            'p'=>$atts['id'],
            'tax_query' => array(
                array(
                  'taxonomy' => 'year',
                  'field' => 'id',
                //   'terms' => 'dgit'
                )
            )
           
        );
        // $string = '';
        $query = new \WP_Query( $args,$args2 );
        $posts=$query->posts;
        
       
        foreach($posts as $post){
            //    print_r($posts);
            
                if($atts['id']==$post->ID){
                    echo "<b>Book Id</b>".": ".$post->ID."<br>";    
                }else{
                    echo "Book id    doesnot match";
                }
               
               
                           
                echo "<b>year</b>".": ";
                $termlist = wp_get_post_terms($post->ID,'year');
                foreach($termlist  as $term){
                    echo $term->name;
                    echo ",";
                }
                echo "<br>";
                echo "<b>genre</b>".": ";
                $termlist = wp_get_post_terms($post->ID,'genre');
                foreach($termlist  as $term){
                    echo $term->name;
                    echo ",";
                }
                echo "<br>";
                if($atts['publisher']==$post->publisher){
                    echo "<b>Publisher Name</b>".": ".$post->publisher."<br>";    
                }else{
                    echo "Publisher name not matched";
                }
                
                echo "<b>Edition: </b>".$post->edition."<br>";

        }
        wp_reset_postdata();
        
        

    }
   
}
