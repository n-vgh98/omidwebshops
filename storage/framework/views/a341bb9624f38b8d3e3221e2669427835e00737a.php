<?php
    if(session()->has('locale'))
        {
            \Illuminate\Support\Facades\App::setLocale(session('locale'));

        }

?>
<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural')); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="<?php echo e($dataType->icon); ?>"></i> <?php echo e($dataType->getTranslatedAttribute('display_name_plural')); ?>

        </h1>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add', app($dataType->model_name))): ?>
            <a href="<?php echo e(route('voyager.'.$dataType->slug.'.create')); ?>" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span><?php echo e(__('voyager::generic.add_new')); ?></span>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', app($dataType->model_name))): ?>
            <?php echo $__env->make('voyager::partials.bulk-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', app($dataType->model_name))): ?>
            <?php if(isset($dataType->order_column) && isset($dataType->order_display_column)): ?>
                <a href="<?php echo e(route('voyager.'.$dataType->slug.'.order')); ?>" class="btn btn-primary btn-add-new">
                    <i class="voyager-list"></i> <span><?php echo e(__('voyager::bread.order')); ?></span>
                </a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', app($dataType->model_name))): ?>
            <?php if($usesSoftDeletes): ?>
                <input type="checkbox" <?php if($showSoftDeleted): ?> checked <?php endif; ?> id="show_soft_deletes" data-toggle="toggle" data-on="<?php echo e(__('voyager::bread.soft_deletes_off')); ?>" data-off="<?php echo e(__('voyager::bread.soft_deletes_on')); ?>">
            <?php endif; ?>
        <?php endif; ?>
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(method_exists($action, 'massAction')): ?>
                <?php echo $__env->make('voyager::bread.partials.actions', ['action' => $action, 'data' => null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content browse container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <?php if($isServerSide): ?>
                            <form method="get" class="form-search">
                                 <?php echo e(__('product.name_product')); ?> :
                                <div id="search-input">

                                    <div class="col-2">
                                        <select id="filter1" name="filtername" class=" select2 select2-hidden-accessible" aria-hidden="true">
                                            <option value="contains" <?php if($search->filter == "contains"): ?> selected <?php endif; ?>><?php echo e(__('product.contains')); ?></option>
                                            <option value="equals" <?php if($search->filter == "equals"): ?> selected <?php endif; ?>><?php echo e(__('product.equal')); ?></option>
                                        </select>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control" placeholder="<?php echo e(__('voyager::generic.search')); ?>" name="sname" value="<?php echo e($searchnameproduct->value); ?>">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php echo e(__('product.catagory1')); ?>

                                <div id="search-input">

                                    <div class="col-2">

                                        <select id="catagory1" name="keycatagory1" class=" select2 select2-hidden-accessible" aria-hidden="true">
                                            <option value="all"  <?php if( (empty($searchcatagory1->key))): ?> selected <?php endif; ?>><?php echo e(__('product.all_item')); ?></option>
                                            <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cat1->parent_id ==null && $cat1->name !=__('generic.home')): ?>
                                                    <option value="<?php echo e($cat1->id); ?>"  <?php if($searchcatagory1->key == $cat1->id): ?> selected <?php endif; ?> ><?php echo e($cat1->getTranslatedAttribute('name')); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="input-group col-md-12">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php echo e(__('product.catagory2')); ?>

                                <div id="search-input">
                                    <div class="col-2">
                                        <select id="catagory2" name="keycatagory2" class="form-control select2 select2-hidden-accessible" aria-hidden="true">
                                            <?php
                                                $objid = $catagories->first();
                                                $id = $objid->id;
                                                $parentid = $objid->parent_id;
                                                $first=true;
                                            ?>
                                            <option value="all"  <?php if( (empty($searchcatagory2->key))): ?> selected <?php endif; ?>><?php echo e(__('product.all_item')); ?></option>
                                            <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($cat2->parent_id ==$id): ?>
                                                    <?php if($first) $id3 = $cat2->id;$first=false; ?>
                                                    <option value="<?php echo e($cat2->id); ?>" <?php if($searchcatagory2->key == $cat2->id ): ?> selected <?php endif; ?>><?php echo e($cat2->getTranslatedAttribute('name')); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>

                                    <div class="input-group col-md-12">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php echo e(__('product.catagory3')); ?>

                                <div id="search-input">
                                    <div class="col-2">
                                        <select id="catagory3" name="keycatagory3" class="form-control select2 select2-hidden-accessible" aria-hidden="true">
                                            <option value="all"  <?php if( (empty($searchcatagory3->key))): ?> selected <?php endif; ?>> <?php echo e(__('product.all_item')); ?></option>
                                            <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($cat3->parent_id ==$id3): ?>
                                                    <option value="<?php echo e($cat3->id); ?>" <?php if($searchcatagory3->key == $cat3->id ): ?> selected <?php endif; ?>><?php echo e($cat3->getTranslatedAttribute('name')); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="input-group col-md-12">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php if(Request::has('sort_order') && Request::has('order_by')): ?>
                                    <input type="hidden" name="sort_order" value="<?php echo e(Request::get('sort_order')); ?>">
                                    <input type="hidden" name="order_by" value="<?php echo e(Request::get('order_by')); ?>">
                                <?php endif; ?>
                            </form>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <?php if($showCheckboxColumn): ?>
                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $dataType->browseRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th>
                                            <?php if($isServerSide): ?>
                                                <a href="<?php echo e($row->sortByUrl($orderBy, $sortOrder)); ?>">
                                            <?php endif; ?>
                                            <?php echo e($row->getTranslatedAttribute('display_name')); ?>

                                            <?php if($isServerSide): ?>
                                                <?php if($row->isCurrentSortField($orderBy)): ?>
                                                    <?php if($sortOrder == 'asc'): ?>
                                                        <i class="voyager-angle-up pull-right"></i>
                                                    <?php else: ?>
                                                        <i class="voyager-angle-down pull-right"></i>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        </th>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <th class="actions text-right"><?php echo e(__('voyager::generic.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $dataTypeContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if($showCheckboxColumn): ?>
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_<?php echo e($data->getKey()); ?>" value="<?php echo e($data->getKey()); ?>">
                                            </td>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $dataType->browseRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            if ($data->{$row->field.'_browse'}) {
                                                $data->{$row->field} = $data->{$row->field.'_browse'};
                                            }
                                            ?>
                                            <td>
                                                <?php if(isset($row->details->view)): ?>
                                                    <?php echo $__env->make($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $data->{$row->field}, 'action' => 'browse', 'view' => 'browse', 'options' => $row->details], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php elseif($row->type == 'image'): ?>
                                                    <img src="<?php if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)): ?><?php echo e(Voyager::image( $data->{$row->field} )); ?><?php else: ?><?php echo e($data->{$row->field}); ?><?php endif; ?>" style="width:100px">
                                                <?php elseif($row->type == 'relationship'): ?>
                                                    <?php echo $__env->make('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php elseif($row->type == 'select_multiple'): ?>
                                                    <?php if(property_exists($row->details, 'relationship')): ?>

                                                        <?php $__currentLoopData = $data->{$row->field}; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($item->{$row->field}); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php elseif(property_exists($row->details, 'options')): ?>
                                                        <?php if(!empty(json_decode($data->{$row->field}))): ?>
                                                            <?php $__currentLoopData = json_decode($data->{$row->field}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(@$row->details->options->{$item}): ?>
                                                                    <?php echo e($row->details->options->{$item} . (!$loop->last ? ', ' : '')); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php echo e(__('voyager::generic.none')); ?>

                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php elseif($row->type == 'multiple_checkbox' && property_exists($row->details, 'options')): ?>
                                                        <?php if(@count(json_decode($data->{$row->field})) > 0): ?>
                                                            <?php $__currentLoopData = json_decode($data->{$row->field}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if(@$row->details->options->{$item}): ?>
                                                                    <?php echo e($row->details->options->{$item} . (!$loop->last ? ', ' : '')); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <?php echo e(__('voyager::generic.none')); ?>

                                                        <?php endif; ?>

                                                <?php elseif(($row->type == 'select_dropdown' || $row->type == 'radio_btn') && property_exists($row->details, 'options')): ?>

                                                    <?php echo $row->details->options->{$data->{$row->field}} ?? ''; ?>


                                                <?php elseif($row->type == 'date' || $row->type == 'timestamp'): ?>
                                                    <?php if( property_exists($row->details, 'format') && !is_null($data->{$row->field}) ): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($data->{$row->field})->formatLocalized($row->details->format)); ?>

                                                    <?php else: ?>
                                                        <?php echo e($data->{$row->field}); ?>

                                                    <?php endif; ?>
                                                <?php elseif($row->type == 'checkbox'): ?>
                                                    <?php if(property_exists($row->details, 'on') && property_exists($row->details, 'off')): ?>
                                                        <?php if($data->{$row->field}): ?>
                                                            <span class="label label-info"><?php echo e($row->details->on); ?></span>
                                                        <?php else: ?>
                                                            <span class="label label-primary"><?php echo e($row->details->off); ?></span>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                    <?php echo e($data->{$row->field}); ?>

                                                    <?php endif; ?>
                                                <?php elseif($row->type == 'color'): ?>
                                                    <span class="badge badge-lg" style="background-color: <?php echo e($data->{$row->field}); ?>"><?php echo e($data->{$row->field}); ?></span>
                                                <?php elseif($row->type == 'text'): ?>
                                                    <?php echo $__env->make('voyager::multilingual.input-hidden-bread-browse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <div><?php echo e(mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field}); ?></div>
                                                <?php elseif($row->type == 'text_area'): ?>
                                                    <?php echo $__env->make('voyager::multilingual.input-hidden-bread-browse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <div><?php echo e(mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field}); ?></div>
                                                <?php elseif($row->type == 'file' && !empty($data->{$row->field}) ): ?>
                                                    <?php echo $__env->make('voyager::multilingual.input-hidden-bread-browse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php if(json_decode($data->{$row->field}) !== null): ?>
                                                        <?php $__currentLoopData = json_decode($data->{$row->field}); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a href="<?php echo e(Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: ''); ?>" target="_blank">
                                                                <?php echo e($file->original_name ?: ''); ?>

                                                            </a>
                                                            <br/>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field})); ?>" target="_blank">
                                                            Download
                                                        </a>
                                                    <?php endif; ?>
                                                <?php elseif($row->type == 'rich_text_box'): ?>
                                                    <?php echo $__env->make('voyager::multilingual.input-hidden-bread-browse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <div><?php echo e(mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>')); ?></div>
                                                <?php elseif($row->type == 'coordinates'): ?>
                                                    <?php echo $__env->make('voyager::partials.coordinates-static-image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php elseif($row->type == 'multiple_images'): ?>
                                                    <?php $images = json_decode($data->{$row->field}); ?>
                                                    <?php if($images): ?>
                                                        <?php $images = array_slice($images, 0, 3); ?>
                                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <img src="<?php if( !filter_var($image, FILTER_VALIDATE_URL)): ?><?php echo e(Voyager::image( $image )); ?><?php else: ?><?php echo e($image); ?><?php endif; ?>" style="width:50px">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php elseif($row->type == 'media_picker'): ?>
                                                    <?php
                                                        if (is_array($data->{$row->field})) {
                                                            $files = $data->{$row->field};
                                                        } else {
                                                            $files = json_decode($data->{$row->field});
                                                        }
                                                    ?>
                                                    <?php if($files): ?>
                                                        <?php if(property_exists($row->details, 'show_as_images') && $row->details->show_as_images): ?>
                                                            <?php $__currentLoopData = array_slice($files, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <img src="<?php if( !filter_var($file, FILTER_VALIDATE_URL)): ?><?php echo e(Voyager::image( $file )); ?><?php else: ?><?php echo e($file); ?><?php endif; ?>" style="width:50px">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <ul>
                                                            <?php $__currentLoopData = array_slice($files, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($file); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                        <?php if(count($files) > 3): ?>
                                                            <?php echo e(__('voyager::media.files_more', ['count' => (count($files) - 3)])); ?>

                                                        <?php endif; ?>
                                                    <?php elseif(is_array($files) && count($files) == 0): ?>
                                                        <?php echo e(trans_choice('voyager::media.files', 0)); ?>

                                                    <?php elseif($data->{$row->field} != ''): ?>
                                                        <?php if(property_exists($row->details, 'show_as_images') && $row->details->show_as_images): ?>
                                                            <img src="<?php if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)): ?><?php echo e(Voyager::image( $data->{$row->field} )); ?><?php else: ?><?php echo e($data->{$row->field}); ?><?php endif; ?>" style="width:50px">
                                                        <?php else: ?>
                                                            <?php echo e($data->{$row->field}); ?>

                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php echo e(trans_choice('voyager::media.files', 0)); ?>

                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php echo $__env->make('voyager::multilingual.input-hidden-bread-browse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <span><?php echo e($data->{$row->field}); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td class="no-sort no-click bread-actions">
                                            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!method_exists($action, 'massAction')): ?>
                                                    <?php echo $__env->make('voyager::bread.partials.actions', ['action' => $action], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($isServerSide): ?>
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite"><?php echo e(trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ])); ?></div>
                            </div>
                            <div class="pull-right">
                                <?php echo e($dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'showSoftDeleted' => $showSoftDeleted,
                                ])->links()); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete_question')); ?> <?php echo e(strtolower($dataType->getTranslatedAttribute('display_name_singular'))); ?>?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="<?php echo e(__('voyager::generic.delete_confirm')); ?>">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php if(!$dataType->server_side && config('dashboard.data_tables.responsive')): ?>
    <link rel="stylesheet" href="<?php echo e(voyager_asset('lib/css/responsive.dataTables.min.css')); ?>">
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <!-- DataTables -->
    <?php if(!$dataType->server_side && config('dashboard.data_tables.responsive')): ?>
        <script src="<?php echo e(voyager_asset('lib/js/dataTables.responsive.min.js')); ?>"></script>
    <?php endif; ?>
    <script>
        $(document).ready(function () {
            <?php if(!$dataType->server_side): ?>
                var table = $('#dataTable').DataTable(<?php echo json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true); ?>);
            <?php else: ?>



            <?php endif; ?>

            <?php if($isModelTranslatable): ?>
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            <?php endif; ?>
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });

            $('#catagory2').change(function () {
                var selectedindexcatagory2 = $(this).val();
             if(selectedindexcatagory2 !='all')
             {
                 console.log("selected index catgory2 is "+selectedindexcatagory2);
                 var cat2 =<?php echo $catagories ;?>;
                 var option = "<option value=\"all\" selected>همه موارد</option>";
                 if(selectedindexcatagory2) {
                     console.log("selected index catgory2 is not null");
                     for (var x in cat2)
                         if (cat2[x]['parent_id'] == selectedindexcatagory2)
                             option += "<option value=" + cat2[x]['id'] + ">" + cat2[x]['name'] + "</option>";
                 }
                 console.log("option is :" +option);
                 if(option == "")
                 {
                     console.log("option is empty");
                     $('#catagory3').find('option').remove();
                 }
                 else
                     $('#catagory3').html(option);
             }


            });
            $('#catagory1').change(function () {
                var selectedindexcatagory1 = $(this).val();
             if(selectedindexcatagory1 !='all')
             {
                 console.log("cat 3 is "+selectedindexcatagory1);
                 var cat1 =<?php echo $catagories ;?>;

                 var option = "<option value=\"all\" selected>همه موارد</option>";
                 for(var x in cat1)
                     if(cat1[x]['parent_id'] == selectedindexcatagory1)
                         option += "<option value="+cat1[x]['id']+">"+cat1[x]['name']+"</option>";
                 $('#catagory2').html(option);
                 $('#catagory2').trigger('change');
             }

            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '<?php echo e(route('voyager.'.$dataType->slug.'.destroy', '__id')); ?>'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        <?php if($usesSoftDeletes): ?>
            <?php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            ?>
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="<?php echo e((route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true))); ?>"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="<?php echo e((route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true))); ?>"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        <?php endif; ?>
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\shop-laravel2lang\vendor\tcg\voyager\src/../resources/views/products/browse.blade.php ENDPATH**/ ?>