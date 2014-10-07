<?php
/*
 Plugin Name: Stawki podatku
 Description: Wtyczka pozwalająca wypisać bieżące stawki podatku
 Version: 1.0
 Author: Krzysztof Chadynka
 License: Freeware
 */
 
 class TaxonomyWidget extends WP_Widget
 {
 	//konstruktor
 	public function TaxonomyWidget()
	{
		parent::WP_Widget(false, $name = __('Skala podatku', 'Stawki podatku') );
	}	
	
	//tworzenie formularza widgetu
	public function form($instance)
	{
		if ($instance)
		{
			$year_from = esc_attr($instance['year_from']);
			$year_to = esc_attr($instance['year_to']);
			$base = esc_attr($instance['base']);
			$tax1 = esc_attr($instance['tax1']);
			$tax2 = esc_attr($instance['tax2']);		
		}
		else 
		{
			$year_from = '';
			$year_to = '';
			$base = '';
			$tax1 = '';
			$tax2 = '';
		}
		?>
			<p>
				<label for="<?php echo $this->get_field_id('year_from') ?>"><?php _e('Od','Stawki podatku'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('year_from'); ?>" name="<?php echo $this->get_field_name('year_from'); ?>" type="text" value="<?php echo $year_from; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('year_to') ?>"><?php _e('Do','Stawki podatku'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('year_to'); ?>" name="<?php echo $this->get_field_name('year_to'); ?>" type="text" value="<?php echo $year_to; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('base') ?>"><?php _e('Podstawa obliczeniowa','Stawki podatku'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('base'); ?>" name="<?php echo $this->get_field_name('base'); ?>" type="text" value="<?php echo $base; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('tax1') ?>"><?php _e('Podatek wynosi (do)','Stawki podatku'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('tax1'); ?>" name="<?php echo $this->get_field_name('tax1'); ?>" type="text" value="<?php echo $tax1; ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('tax2') ?>"><?php _e('Podatek wynosi (ponad)','Stawki podatku'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('tax2'); ?>" name="<?php echo $this->get_field_name('tax2'); ?>" type="text" value="<?php echo $tax2; ?>" />
			</p>
		<?php
	}
	
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
      	// Fields
      	$instance['year_from'] = strip_tags($new_instance['year_from']);
		$instance['year_to'] = strip_tags($new_instance['year_to']);
		$instance['base'] = strip_tags($new_instance['base']);
		$instance['tax1'] = strip_tags($new_instance['tax1']);
		$instance['tax2'] = strip_tags($new_instance['tax2']);
     	return $instance;
	}
	
	//wyświetlanie treści widgetu
	public function widget($args, $instance)
	{
		echo '<table>';
			echo '<th>Podstawa obliczeniowa podatku w złotych</th>';
			echo '<th>Podatek wynosi</th>';
			
			echo '<tr>';
				echo '<td>ponad <b>'.$instance['base'].'</b></td>';
				echo '<td>'.$instance['tax1'].'</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>do <b>'.$instance['base'].'</b></td>';
				echo '<td>'.$instance['tax2'].'</td>';
			echo '</tr>';
		echo '</table>';
		
		echo '<p>Dane obowiązują od <b>'.$instance['year_from'].'</b> do <b>'.$instance['year_to'].'</b></p>';
	}
 }
 
 function register_tax_widget() {
    register_widget('TaxonomyWidget');
}
add_action('widgets_init', 'register_tax_widget');
 
?>