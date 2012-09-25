

		
		<?php
			foreach($results as $row){
				$id = $row->id;
				$title = $row->title;
				$text1 = $row->text1;
				$text2 = $row->text2;
				$page = $row->page;
			
			}
			
		?> 
		<?php $hidden_fields = array('id' => $id); ?>
		<?php echo form_open('site/updateData', '', $hidden_fields) ?>
		<h2> Pagina : <?php echo $page; ?> </h2>
		 <label for="title">Titel</label> <br/>
		 <input type="input" name="title" value="<?php echo $title; ?>"/><br />

		 <label for="text1">Tekst 1</label> <br/>
		 <textarea name="text1" ><?php echo $text1; ?></textarea><br />

		 <label for="text2">Tekst 2</label><br/>
		 <textarea name="text2" ><?php echo $text2; ?></textarea><br />

		 <input type="submit" name="submit" value="Update pagina" /> 	
		 <br/>
		 <?php echo form_close(); ?>

		
  


