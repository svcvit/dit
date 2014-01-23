
    <div class="pagination">
        <ul>
            <?php echo $this->pagination->create_links();?>
        </ul>  
    </div>
    <div class="container2">
    <table class="table table-hover">
        
      <thead> 
        <tr>
            <?php foreach($fields as $field_name => $field_display): ?>
            <th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
            <?php echo anchor("dashboard/index/$field_name/" . (($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') , 
            $field_display); ?> </th> <?php endforeach; ?>
        </tr>
        </thead>
        
        <tbody>
        <?php foreach ($items as $item): ?>
            
            <tr>
                
              <?php foreach ($fields as $field_name => $field_display):?>
                
                <td><?php echo $item->$field_name;?></td>
        
              <?php endforeach; ?>
                
            </tr>
            
             <?php endforeach; ?>

       </tbody>
    </table>
    </div>