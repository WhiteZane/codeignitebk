
<h2><?php echo $title; ?></h2>

<table border='1' cellpadding='4'>
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Content</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($compare as $compare_item): ?>
        <tr>
            <td><?php echo $compare_item['title']; ?></td>
            <td><?php echo $compare_item['compare1']; ?></td>
            <td><?php echo $compare_item['ljcompare']; ?></td>
            <td>
                <a href="<?php echo site_url('compare/'.$compare_item['slug']); ?>">View</a> | 
                <a href="<?php echo site_url('compare/edit/'.$compare_item['id']); ?>">Edit</a> | 
                <!-- <a href="<?php //echo site_url('compare/delete/'.$compare_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> -->
            </td>
        </tr>
<?php endforeach; ?>
</table>