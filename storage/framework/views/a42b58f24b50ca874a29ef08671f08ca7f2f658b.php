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
                    <h2>Accounts Heads<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a href="<?php echo e(url('accounts-heads/add')); ?>" class="green"><i class="fa fa-plus green"></i> <span class="green">Add New</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Account Heads </th>
                            <th class="column-title">Account Name </th>
                            <th class="column-title">Type Name </th>
                            <th class="column-title">Supplyer Name</th>
                            <th class="column-title">Credit Days </th>
                            <th class="column-title">Opening Balance </th>
                            <th class="column-title">Balance Type</th>
                            <th class="column-title">Balance Date </th>
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
								<td class=" "><?php echo e($data->type_name); ?></td>
								<td class=" "><?php echo e($data->closes_to); ?></td>
								<td class=" "><?php echo e($data->put_title_as); ?></td>
								<td class=" "><?php echo e($data->control_as); ?></td>
								<td class=" "><?php echo e($data->control_narr); ?></td>
								<td class=" "><?php echo e($data->personal); ?></td>
								<td class=" "><?php echo e($data->summarise_it); ?></td>
								<td class=" "><?php if($data->print_order==1): ?> Yes <?php else: ?> No <?php endif; ?></td>
								<td class=" last">
									<a href="<?php echo e(url('accounts-heads/edit/')); ?>/<?php echo e($data->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
									<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo e($data->id); ?>"><i class="fa fa-trash-o"></i> Delete </a>
								
									<!-- Modal -->
									<div id="myModal<?php echo e($data->id); ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
									
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header modal-header-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><?php echo e($data->type_name); ?></h4>
										  </div>
										  <div class="modal-body">
											<h3>Do you want to delete this account type?</h3>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-danger left" data-dismiss="modal">Delete</button>
											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
										  </div>
										</div>
									
									  </div>
									</div>
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

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>