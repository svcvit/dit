<div class="pagination">
        <ul>
<?php echo $this->pagination->create_links();?>
        </ul>  </div>
    <table class="table table-hover">
        <thead>

        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Media</th>
            <th>Email</th>
            <th>Vip</th>
            <th>Attend</th>
            <th>Date</th>
            <th>Interview with</th>
            <th>Invitation Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->surname; ?></td>
            <td><?php echo $item->media; ?></td>
            <td><?php echo $item->email; ?></td>
            <td><?php echo $item->vip; ?></td>
            <td><?php echo $item->attend; ?></td>
            <td><?php echo $item->date; ?></td>
            <td><?php echo $item->interview_with; ?></td>
            <td><?php echo $item->reg_date; ?></td>
 

        </tr>
        <?php endforeach; ?>

        </tbody>
    </table>