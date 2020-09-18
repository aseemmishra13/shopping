<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Edit</title> 
   </head> 
	
   <body> 
      <form method = "" action = "">
		
         <?php 
            echo form_open('admin/update_student'); 
          
            echo form_label('serial.'); 
            echo form_input(array('id'=>'serial',
               'name'=>'serial','value'=>$records[0]->serial)); 
            echo "<br/>"; 
				
            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name',
               'value'=>$records[0]->name)); 
            echo "<br/>"; 
			echo form_label('Description'); 
            echo form_input(array('id'=>'description','name'=>'description',
               'value'=>$records[0]->description)); 
            echo "<br/>"; 
			echo form_label('Price'); 
            echo form_input(array('id'=>'price','name'=>'price',
               'value'=>$records[0]->price)); 
            echo "<br/>"; 
			echo form_label('Image'); 
            echo form_input(array('id'=>'picture','name'=>'picture',
               'value'=>$records[0]->picture)); 
            echo "<br/>"; 
				
            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo form_close();
         ?> 
			
      </form> 
   </body>
	
</html>