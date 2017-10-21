<script language="javascript">
function active_status(id) {
    var check = jQuery('#check-'+id).attr('checked', 'checked');
    jQuery('form[name=form]').submit();
}
</script>
<?php if (!empty($msg)):?>
<div class="alert alert-<?php echo $msg['type'];?>" role="alert"><?php echo $msg['text'];
?></div>
<?php endif;?>
<form method="post" action="<?php echo base_url().'attribute'?>" name="form">

    <div class="control-group container">
        <div>Name Search</div>
        <a href="<?php echo base_url().'attribute-detail';?>" class="btn btn-primary">Add</a>
        <div class="btn-group">
            <input value="<?php echo !empty($keyword)?$keyword:'';?>" type="text" class="form-control" name="keyword" placeholder="Search">
            <span class="input-group-btn">
                <input type="submit" name="search-button" class="btn btn-default" onClick="return search();" value="Search">
                <input type="submit" name="clear-button" class="btn btn-default" onClick="return document.form.submit();" value="Clear">
            </span>
        </div>
    </div>
    <div class="container">
<?php if (count($attributes) == 0):?>
<div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Notice!</strong> Empty Attribute
            </div>
<?php  else :?>
<table id="table-form" class="table table-striped">
            <thead>
                <tr>
                    <th width="10%"><a href="?order=cat_field_name&dir=<?php echo $order_dir;?>">Attribute</a></th>
                    <th width="10%"><a href="?order=cat_field_id&dir=<?php echo $order_dir;?>">ID</a></th>

                    <th width="10%"><a href="?order=cat_field_description&dir=<?php echo $order_dir;?>">Description</a></th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody id="accordion" role="tablist" aria-multiselectable="true">
<?php $i = 1;?>
                <?php foreach ($attributes as $key => $attribute):?>
                    <tr>

                        <td><a href="<?php echo base_url().'attribute-detail/'.$attribute['cat_field_id'];?>"><?php echo $attribute['cat_field_name'];
?></a></td>
                        <td>
                        <span class="hide">
                            <input id="check-<?php echo $attribute['cat_field_id'];?>" type="checkbox" name="selected[]" value="<?php echo $attribute['cat_field_id'];?>"/>
                        </span>
<?php echo $attribute['cat_field_id'];?></td>
                        <td><?php echo $attribute['cat_field_description']?></td>
                        <td>
<?php if ($attribute['cat_field_status'] == 0):?>
                                <label class="icon-switch">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                    <input type="submit" name="inactive-<?php echo $attribute['cat_field_id'];?>" value="Inactive" onClick="active_status(<?php echo $attribute['cat_field_id'];?>);" class="btn-active hidden" id="inactive-<?php echo $attribute['cat_field_id'];?>">
                                </label>
<?php  else :?>
                                <label class="icon-switch">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    <input type="submit" name="active-<?php echo $attribute['cat_field_id'];?>" value="Active" onClick="active_status(<?php echo $attribute['cat_field_id'];?>);" class="btn-active hidden" id="active-<?php echo $attribute['cat_field_id'];?>">
                                </label>
<?php endif;?>
</td>
                    </tr>
<?php $i++;?>
                <?php endforeach;?>
</tbody>
            <tfoot>
                <tr>
                    <td colspan="10">
                        <ul class="pagination">
<?php echo $this->pagination->create_links();?>
</ul>
                    </td>
                </tr>
            </tfoot>
        </table>
<?php endif;?>
</div>
</form>

