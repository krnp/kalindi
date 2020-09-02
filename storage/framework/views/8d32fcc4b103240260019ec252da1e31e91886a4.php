<?php $__env->startSection('content'); ?>
<style type="text/css">
  td {
  padding: 50px;
}
</style>
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
                    <h2>Bank Receipt Voucher<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="<?php echo e(url('journal/add')); ?>" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p></p>

                    <div class="table-responsive">
                      <table class="table table-bordered jambo_table bulk_action">
                        <thead>
                          
                          <tr class="headings">
                              
                                <th class="column-title">Voucher No</th>
                                <th class="column-title">Case No</th>
                                <th class="column-title">Account Code</th>
                                <th class="column-title">Narration</th>
                                <th class="column-title">Amount</th>
                                <th class="column-title">Principle</th>
                                <th class="column-title">Intrest</th>
                                <th class="column-title">Check No</th>
                                 <th class="column-title">Check Date</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                         
                        </thead>
                        <?php if(count($result) > 0): ?>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $results): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                          
                        
                          <td style="display: none"><?php echo e($results->id); ?></td>
                          <td><?php echo e($results->v_no); ?></td>
                          <td><?php echo e($results->case_no); ?></td>
                          <td><?php echo e($results->acc_code); ?></td>
                          <td><?php echo e($results->narr); ?></td>
                          <td><?php echo e($results->amount); ?></td>
                          <td><?php echo e($results->principle); ?></td>
                          <td><?php echo e($results->interest); ?></td>
                          <td><?php echo e($results->ch_no); ?></td>
                          <td><?php echo e($results->ch_date); ?></td>
                  
                           <td class="last">
                 <a href="<?php echo e(url('bank_receipt/edit/')); ?>/<?php echo e($results->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                  <a href="#" class="btn btn-danger btn-xs" onclick='deleteItem(<?php echo e($results->id); ?>)'><i class="fa fa-trash-o"></i> Delete </a>

                
                </td>

                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr>
                          <td colspan="10">No Records Found!!!</td>
                        </tr>
                        <?php endif; ?>
                      </table>
                    </div>       
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
           url:"<?php echo e(url('bank_receipt/delete')); ?>?id="+id,
           success:function(res){               
            if(res){
                alert('deleted') ;  
              setTimeout(function(){ location.reload(); }, 1500);  
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