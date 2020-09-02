<?php $__env->startSection('content'); ?>

<div class="col-md-12 col-sm-12 col-xs-12">
  <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <?php echo e(session('status')); ?>
            </div>
                    <?php endif; ?>
          
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Product<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="<?php echo e(url('product/add')); ?>" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New Product</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Profile</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">Brand</th>
                            <th class="column-title">Model</th>
                            <th class="column-title">Info </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
              <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="even pointer">

                <td class=" "><img src="<?php echo e(URL::asset('images/'.$data->image)); ?>" width="80" height="80"></td>
                <td class=" "><?php echo e($data->name); ?></td>
                <td class=" "><?php echo e($data->brand); ?></td>
                <td class=" "><?php echo e($data->model); ?></td>
                <td class=" "><?php echo e($data->info); ?></td>
                
                <td class=" last">
                  <a href="<?php echo e(url('product/edit/')); ?>/<?php echo e($data->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  <a href="#" class="btn btn-danger btn-xs"  onclick='deleteItem(<?php echo e($data->id); ?>)'><i class="fa fa-trash-o"></i> Delete </a>
      
                </td>
                </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
              
          <div align="center"><?php echo e($result->links()); ?></div>
                  </div>
                </div>
            </div>
      

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  
function deleteItem(id){

    var checkstr =  confirm('are you sure you want to delete this?');
    if(checkstr == true){
    $.ajax({
           type:"GET",
           url:"<?php echo e(url('product/delete')); ?>?id="+id,
           success:function(res){               
            if(res){
                alert('deleted') ;  
              setTimeout(function(){ location.reload(); }, 1000);  
            }else{
                alert('Error in deleted') ;      
            }
           }
        });

    }else{
    return false;
    }
  }
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>