<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Name');?></label>
    <input type="text" ng-non-bindable class="form-control form-control-sm" name="Name"  value="<?php echo htmlspecialchars($departament->name);?>" />
</div>

<?php include(erLhcoreClassDesign::designtpl('lhdepartment/parts/email.tpl.php'));?>

<div class="row form-group">
    <div class="col-md-3">
		<label><input title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Visible only if online');?>" type="checkbox" name="VisibleIfOnline" value="1" <?php if ($departament->visible_if_online == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Visible only if online');?></label>
	</div>
	<div class="col-md-3">
		<label><input type="checkbox" name="Disabled" value="1" <?php if ($departament->disabled == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Disabled');?></label>
	</div>
	<div class="col-md-3">
        <label><input title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Will not be visible to visitor');?>" type="checkbox" name="Hidden" value="1" <?php if ($departament->hidden == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hidden');?></label>
    </div>
    <div class="col-md-3">
        <label><input title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Archived');?>" type="checkbox" name="archive" value="1" <?php if ($departament->archive == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Archived');?></label>
    </div>
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Maximum pending chats, if this limit is reached department becomes offline automatically');?> <i>(<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Group limit')?> - <?php echo $departament->pending_group_max?>)</i></label>
    <input type="text" ng-non-bindable class="form-control form-control-sm" name="pending_max" value="<?php echo htmlspecialchars($departament->pending_max);?>" />
</div>

<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Delay in seconds before leave a message form is shown. 0 Means functionality is disabled, ');?></label>
    <input type="text" ng-non-bindable class="form-control form-control-sm" name="delay_lm" value="<?php echo htmlspecialchars($departament->delay_lm);?>" />
</div>

<div class="row form-group">
	<div class="col-6">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Priority, used for chats priority');?></label>
        <input type="text" ng-non-bindable class="form-control form-control-sm" name="Priority" value="<?php echo htmlspecialchars($departament->priority);?>" />
	</div>
	<div class="col-6">
		<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Priority, used for departments sort');?></label>
        <input type="text" ng-non-bindable class="form-control form-control-sm" name="SortPriority" value="<?php echo htmlspecialchars($departament->sort_priority);?>" />
	</div>
</div>	

<div role="tabpanel" class="form-group">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs mb-2" role="tablist">
			<li role="presentation" class="nav-item"><a class="nav-link active" href="#onlinehours" aria-controls="onlinehours" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Automate online hours');?></a></li>
			<li role="presentation" class="nav-item"><a class="nav-link" href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Notifications');?></a></li>
			
			<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','actworkflow')) : ?>
			<li role="presentation" class="nav-item"><a class="nav-link" href="#chattransfer" aria-controls="chattransfer" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Chat transfer worklow');?></a></li>
			<?php endif;?>
			
			<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','actautoassignment')) : ?>
			<li role="presentation" class="nav-item"><a class="nav-link" href="#autoassignment" aria-controls="autoassignment" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Auto assignment');?></a></li>
			<?php endif;?>
			
			<li role="presentation" class="nav-item"><a class="nav-link" href="#product" aria-controls="product" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Product');?></a></li>
			
			<li role="presentation" class="nav-item"><a class="nav-link" href="#miscellaneous" aria-controls="miscellaneous" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Miscellaneous');?></a></li>

            <li role="presentation" class="nav-item"><a class="nav-link" href="#genericbot" aria-controls="genericbot" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Bot configuration');?></a></li>

            <?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','managesurvey')) : ?>
            <li role="presentation" class="nav-item"><a class="nav-link" href="#survey" aria-controls="survey" role="tab" data-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Survey');?></a></li>
            <?php endif; ?>

			<?php include(erLhcoreClassDesign::designtpl('lhdepartment/parts/tab_multiinclude.tpl.php'));?>
		</ul>
		
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="onlinehours">
			    <label><input ng-init="OnlineHoursActive=<?php if ($departament->online_hours_active == 1) : ?>true<?php else : ?>false<?php endif?>" type="checkbox" ng-model="OnlineHoursActive" name="OnlineHoursActive" value="1" <?php if ($departament->online_hours_active == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Work hours/work days logic is active');?></label>

		    	<div ng-show="OnlineHoursActive">

                    <ul>
                        <li><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Your personal time zone');?> - <?php echo date_default_timezone_get()?>&nbsp;<?php echo date('Y-m-d H:i:s')?>.</li>
                        <li><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Widget time zone');?> - <?php erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) != '' ? print erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) : print date_default_timezone_get()?>&nbsp;<?php echo (new DateTime('now', new DateTimeZone(erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) != '' ? erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) : date_default_timezone_get() )))->format('Y-m-d H:i:s') ?></li>
                        <li><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Workdays/work hours, during these days/hours chat will be active automatically');?></li>
                        <li><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Work hours, 24 hours format, 1 - 24, minutes format 0 - 60');?></li>
                        <li><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','If you want that chat ignored operators online status and went online only by these defined hours can do that');?> <a href="#" onclick="lhc.revealModal({'url':'<?php echo erLhcoreClassDesign::baseurl('system/singlesetting')?>/ignore_user_status'})"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','here');?></a></li>
                    </ul>

                    <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','These hours will be using');?> <b><?php erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) != '' ? print erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) : print date_default_timezone_get()?></b> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','time zone');?> <b>[<?php echo (new DateTime('now', new DateTimeZone(erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) != '' ? erConfigClassLhConfig::getInstance()->getSetting( 'site', 'time_zone' ) : date_default_timezone_get())))->format('Y-m-d H:i:s') ?>]</b> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','to render widget online status');?>. <a href="<?php echo erLhcoreClassDesign::baseurl('system/timezone')?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Change default time zone.');?></a></p>

					<?php foreach (erLhcoreClassDepartament::getWeekDays() as $dayShort => $dayLong) : ?>
						<?php
							$startHourName = $dayShort.'_start_hour';
							$startHourFrontName = $dayShort.'_start_hour_front';
							$startMinutesFrontName = $dayShort.'_start_minutes_front';
							$endHourFrontName = $dayShort.'_end_hour_front';
							$endMinutesFrontName = $dayShort.'_end_minutes_front';
						?>
						<div class="row">
						   <div class="col-12">
							   <label><input type="checkbox" ng-init="OnlineHoursDayActive<?php echo $dayShort ?>=<?php if ($departament->$startHourName != -1) : ?>true<?php else : ?>false<?php endif?>" ng-model="OnlineHoursDayActive<?php echo $dayShort ?>" name="<?php echo $dayShort ?>" value="1" <?php if ($departament->$startHourName != -1) : ?>checked="checked"<?php endif;?> /> <?php echo $dayLong; ?></label>

							   <div class="row" ng-show="OnlineHoursDayActive<?php echo $dayShort ?>">
    							   
    							   <div class="col-3">							   
        							   <div class="form-group">
        							     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours from');?></label>
        							     <input type="number" max="24" class="form-control form-control-sm" name="StartHour<?php echo ucfirst($dayShort); ?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours from, E.g. 8');?>" value="<?php echo $departament->$startHourFrontName; ?>" placeholder="0" />
                                       </div>
                                   </div>
                                   
                                   <div class="col-3"> 
                                       <div class="form-group">
        							     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes from');?></label>
        							     <input type="number" max="60" class="form-control form-control-sm" name="StartMinutes<?php echo ucfirst($dayShort); ?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes from, E.g. 30');?>" value="<?php echo $departament->$startMinutesFrontName; ?>" placeholder="0" />
                                       </div>
                                   </div>
                                   
                                   <div class="col-3">
                                       <div class="form-group">
        							     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours to');?></label>
        							     <input type="number" max="24" class="form-control form-control-sm" name="EndHour<?php echo ucfirst($dayShort); ?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours to, E.g. 17');?>" value="<?php echo $departament->$endHourFrontName; ?>" placeholder="0" />
                                       </div>
                                   </div>
                                   
                                   <div class="col-3">
                                       <div class="form-group"> 
        							     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes to');?></label>
        							     <input type="number" max="60" class="form-control form-control-sm" name="EndMinutes<?php echo ucfirst($dayShort); ?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes to, E.g. 30');?>" value="<?php echo $departament->$endMinutesFrontName; ?>" placeholder="0" />
        						       </div>
    						       </div>
						       
						       </div>
						       
						   </div>
						</div>
					<?php endforeach; ?>

					<hr class="mt-1 mb-1">
					
					<div ng-controller="DepartmentCustomPeriodCtrl as dcpc" ng-init='dcpc.customPeriods = <?php echo $departamentCustomWorkHours; ?>'>
						<h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Custom period');?></h4>

						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Date from');?></label>
									<input type="text" class="form-control form-control-sm" ng-model="dcpc.custom_date_from" name="custom_date_from" id="custom_date_from" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Custom work day');?>" placeholder="<?php echo date('Y-m-d'); ?>" />
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Date to');?></label>
									<input type="text" class="form-control form-control-sm" ng-model="dcpc.custom_date_to" name="custom_date_to" id="custom_date_to" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Custom work day');?>" placeholder="<?php echo date('Y-m-d'); ?>" />
								</div>
							</div>
							<div class="col-4">
								<a class="btn btn-secondary btn-block mt-2" ng-click="dcpc.add()"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Add');?></a>
							</div>
						</div>
						<div class="row">
					        <div class="col-2">
								<div class="form-group">
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours from');?></label>
									<input type="number" max="24" class="form-control form-control-sm" ng-model="dcpc.custom_start_hour" name="custom_start_hour" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours from, E.g. 8');?>" placeholder="0" />
                                </div>
                            </div>  
                            <div class="col-2">     
								<div class="form-group">	
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes from');?></label>
									<input type="number" max="60" class="form-control form-control-sm" ng-model="dcpc.custom_start_hour_min" name="custom_start_hour_min" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes from, E.g. 30');?>" placeholder="0" />
                                </div>
                            </div> 
                            <div class="col-2">
                                <div class="form-group">
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours to');?></label>
									<input type="number" max="24" class="form-control form-control-sm" ng-model="dcpc.custom_end_hour" name="custom_end_hour" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Hours to, E.g. 17');?>" placeholder="0" />
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
									<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes to');?></label>
									<input type="number" max="60" class="form-control form-control-sm" ng-model="dcpc.custom_end_hour_min" name="custom_end_hour_min" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Minutes to, E.g. 30');?>" placeholder="0" />
								</div>									
							</div>									
						</div>
						<table id="customPeriodList" class="table table-responsive" ng-show="dcpc.customPeriods.length != 0">
								<thead>
								<tr>
									<th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Period');?></th>
									<th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Start time');?></th>
									<th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','End time');?></th>
									<th></th>
								</tr>
								</thead>
								<tbody>
									<tr ng-repeat="cp in dcpc.customPeriods">
										<td>
											{{ cp.date_from }} - {{ cp.date_to }}
										</td>
										<td>{{ cp.start_hour }}:{{ cp.start_hour_min }}</td>
										<td>{{ cp.end_hour }}:{{ cp.end_hour_min }}</td>
										<td>
											<a class="btn btn-danger" ng-click="dcpc.delete(cp)"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Remove');?></a>
											<input type="hidden" name="customPeriodDateFrom[]" value="{{ cp.date_from }}">
											<input type="hidden" name="customPeriodDateTo[]" value="{{ cp.date_to }}">
											<input type="hidden" name="customPeriodStartHour[]" value="{{ cp.start_hour }}">
											<input type="hidden" name="customPeriodStartHourMin[]" value="{{ cp.start_hour_min }}">
											<input type="hidden" name="customPeriodEndHour[]" value="{{ cp.end_hour }}">
											<input type="hidden" name="customPeriodEndHourMin[]" value="{{ cp.end_hour_min }}">
											<input type="hidden" name="customPeriodId[]" value="{{ cp.id }}">
										</td>
									</tr>
								</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="notifications">
			
			     <?php include(erLhcoreClassDesign::designtpl('lhdepartment/xmpp_enabled.tpl.php'));?>
			     
			     <?php if ($department_xmpp_enabled == true) : ?>	
			     <div class="row form-group">
					<div class="col-6">
						<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','XMPP recipients');?></label>
						<input type="text" ng-non-bindable class="form-control form-control-sm" name="XMPPRecipients"  value="<?php echo htmlspecialchars($departament->xmpp_recipients);?>" /></div>
					<div class="col-6">
						<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','XMPP group recipients');?></label>
						<input type="text" ng-non-bindable class="form-control form-control-sm" placeholder="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','E.g somechat@conference.server.org/LiveChat');?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','These messages will be send as group messages');?>" name="XMPPRecipientsGroup"  value="<?php echo htmlspecialchars($departament->xmpp_group_recipients);?>" />
					</div>
				</div>	
				<?php endif;?>
				
				<h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Inform about new chats using');?></h4>
				
				<?php if ($department_xmpp_enabled == true) : ?>
				<label><input type="checkbox" name="inform_options[]" value="xmp" <?php if (in_array('xmp', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','XMPP messages');?></label><br>
				<label><input type="checkbox" name="inform_options[]" value="xmp_users" <?php if (in_array('xmp_users', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Send XMPP messages to all department operators');?></label><br>
				<?php endif;?>
				
				<label><input type="checkbox" name="inform_options[]" value="mail" <?php if (in_array('mail', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Mail messages');?></label>
								
				<div class="form-group">
				    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','How many seconds chat can be pending before about chat is informed a staff');?></label>
				    <input type="text" ng-non-bindable class="form-control form-control-sm" name="inform_delay"  value="<?php echo htmlspecialchars($departament->inform_delay);?>" />
				</div>
				
				<div class="form-group">
				    <label><input type="checkbox" name="inform_unread"  value="on" <?php echo $departament->inform_unread == 1 ? 'checked="checked"' : '';?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Inform about unread messages if from last unread user message has passed (seconds)');?></label>
				    <input type="text" ng-non-bindable class="form-control form-control-sm" name="inform_unread_delay" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Please enter value in seconds');?>" value="<?php echo htmlspecialchars($departament->inform_unread_delay);?>" />
				</div>
				
				<div class="form-group">
				    <h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Inform then chat is accepted by one of the staff members using');?></h4>
				    <?php if ($department_xmpp_enabled == true) : ?>
				    <label><input type="checkbox" name="inform_options[]" value="xmp_accepted" <?php if (in_array('xmp_accepted', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','XMPP messages');?></label><br>
				    <label><input type="checkbox" name="inform_options[]" value="xmp_users_accepted" <?php if (in_array('xmp_users_accepted', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Send XMPP messages to all department operators');?></label><br>
				    <?php endif;?>
				    <label><input type="checkbox" name="inform_options[]" value="mail_accepted" <?php if (in_array('mail_accepted', $departament->inform_options_array)) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Mail messages');?></label>
				</div>
								
				<h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Other');?></h4>
				<label><input type="checkbox" name="inform_close" value="1" <?php if ($departament->inform_close == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Inform then chat is closed by operator, only mail notification is send.');?></label><br>
				<label><input type="checkbox" name="inform_close_all" value="1" <?php if ($departament->inform_close_all == 1) : ?>checked="checked"<?php endif;?>  /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Inform then chat is closed automatically, only mail notification is send.');?></label>
				
				<div class="form-group">
				    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Additional e-mail address address to inform about closed chats, to this e-mail will be send all notifications about closed chats');?></label> 
				    <input type="text" ng-non-bindable class="form-control form-control-sm" name="inform_close_all_email" value="<?php echo htmlspecialchars($departament->inform_close_all_email);?>" />
				</div>
				
			</div>
			
			<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','actworkflow')) : ?>
			<div role="tabpanel" class="tab-pane" id="chattransfer">
			     <div class="form-group">
    			     <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','To what department chat should be transferred if it is not accepted');?></label>
    				<?php echo erLhcoreClassRenderHelper::renderCombobox( array (
    										'input_name'     => 'TansferDepartmentID',
    										'optional_field' =>  erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','None'),
    										'display_name'   => 'name',
    				                        'css_class'      => 'form-control form-control-sm',
    										'selected_id'    => $departament->department_transfer_id,
    										'list_function'  => 'erLhcoreClassModelDepartament::getList',
    										'list_function_params'  => array_merge(array('limit' => '1000000'),$limitDepartments),
    				)); ?>
				</div>
				
				<div class="form-group">
				    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Timeout in seconds before chat is transferred to another department. Minimum 5 seconds.');?></label>
				    <input type="text" ng-non-bindable class="form-control form-control-sm" name="TransferTimeout" value="<?php echo htmlspecialchars($departament->transfer_timeout);?>" />
				</div>
				
				<div class="form-group">			
				    <label><input type="checkbox" name="off_op_exec" value="on" <?php if (isset($departament->bot_configuration_array['off_op_exec']) && $departament->bot_configuration_array['off_op_exec'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Transfer immediately to this department if current department has no online operators?');?></label><br>
				    <label><input type="checkbox" name="ru_on_transfer" value="on" <?php if (isset($departament->bot_configuration_array['ru_on_transfer']) && $departament->bot_configuration_array['ru_on_transfer'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Reset assigned user on chat transfer?');?></label><br>
                    <label><input type="checkbox" name="off_if_online" value="on" <?php if (isset($departament->bot_configuration_array['off_if_online']) && $departament->bot_configuration_array['off_if_online'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Automatic transfer is disabled if there is online operators');?></label><br>
                    <label><input type="checkbox" name="nc_cb_execute" value="on" <?php if ($departament->nc_cb_execute == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Execute new chat logic again for recipient department?');?></label><br>
				    <label><input type="checkbox" name="na_cb_execute" value="on" <?php if ($departament->na_cb_execute == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Execute unanswered chat logic again for recipient department?');?></label>
				</div>	  
			</div>
			<?php endif;?>
			
			<div role="tabpanel" class="tab-pane" id="product">
			     <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Based on selected department these products will be shown')?></p>
			     
			     <label><input type="checkbox" name="products_enabled" value="on" <?php if (isset($departament->product_configuration_array['products_enabled']) && $departament->product_configuration_array['products_enabled'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Enable products ');?></label><br>
			     <label><input type="checkbox" name="products_required" value="on" <?php if (isset($departament->product_configuration_array['products_required']) && $departament->product_configuration_array['products_required'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Required');?></label><br>
			     <hr>
			     
			     <div class="form-group" ng-non-bindable>
				    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','Assigned products');?></label>				    
				    <div class="mx170">
                    	<?php 
                    	$departmentProducts = erLhAbstractModelProductDepartament::getList(array('filter' => array('departament_id' => $departament->id)));
                    	
                    	foreach (erLhAbstractModelProduct::getList() as $product) : ?>
                    	    <label><input type="checkbox" name="DepartamentProducts[]" value="<?php echo $product->id?>" <?php echo (in_array($product->id, $departmentProducts) || (is_array($departament->departament_products_id) && in_array($product->id, $departament->departament_products_id)) ? 'checked="checked"' : '');?> /><?php echo htmlspecialchars($product->name_department)?></label><br>
                    	<?php endforeach; ?>
                	</div>                	
				 </div>			 
			</div>
						
			
			<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','actautoassignment')) : ?>
			<div role="tabpanel" class="tab-pane" id="autoassignment">
			    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Active');?> <input type="checkbox" ng-init="AutoAssignActive=<?php if ($departament->active_balancing == 1) : ?>true<?php else : ?>false<?php endif;?>" ng-model="AutoAssignActive" name="AutoAssignActive" value="on" <?php if ($departament->active_balancing == 1) : ?>checked="checked"<?php endif;?> /></label>

		    	<div ng-show="AutoAssignActive">

                    <div class="form-group">
					    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Maximum number of active chats user can have at a time, 0 - unlimited');?></label>
					    <input type="text" ng-non-bindable class="form-control form-control-sm" name="MaxNumberActiveChats" value="<?php echo htmlspecialchars($departament->max_active_chats);?>" />
                    </div>

                    <div class="form-group">
					    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Maximum number of department active chats, 0 - unlimited');?></label>
					    <input type="text"  ng-non-bindable class="form-control form-control-sm" name="MaxNumberActiveDepChats" value="<?php echo htmlspecialchars($departament->max_ac_dep_chats);?>" />
                        <p><small><i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','If this limit is reached, new chats will not be assigned to any operator.')?></i></small></p>
                    </div>

                    <div class="form-group">
					    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Automatically assign chat to another operator if operator did not accepted chat in seconds, 0 - disabled');?></label>
					    <input type="text" ng-non-bindable class="form-control form-control-sm" name="MaxWaitTimeoutSeconds" value="<?php echo htmlspecialchars($departament->max_timeout_seconds);?>" />
                    </div>

                    <div class="form-group">
                        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Minimum delay between chat assignment to operator');?></label>
                        <input type="text" ng-non-bindable class="form-control form-control-sm" name="delay_before_assign" value="<?php echo htmlspecialchars($departament->delay_before_assign);?>" />
                        <p><small><i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Delay in seconds before next chat can be assigned to operator.')?></i></small></p>
                    </div>

                    <div class="form-group">
                        <label><input type="checkbox" name="ExcludeInactiveChats" value="on" <?php if ($departament->exclude_inactive_chats == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Exclude inactive chats');?></label>
                        <p><small><i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Pending and active chats which visitors has closed chats explicitly or visitors being redirected to survey will be excluded')?></i></small></p>
                    </div>

                    <div class="form-group">
                        <label><input type="checkbox" name="assign_same_language" value="on" <?php if ($departament->assign_same_language == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Try to assign chats first to the same language speaking operators');?></label>
                    </div>

                    <div class="form-group">
                        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Check for presence of variable');?></label>
                        <input type="text" ng-non-bindable class="form-control form-control-sm" name="auto_delay_var" value="<?php echo htmlspecialchars(isset($departament->bot_configuration_array['auto_delay_var']) ? $departament->bot_configuration_array['auto_delay_var'] : '');?>" />
                    </div>

                    <div class="form-group">
                        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Resume auto assign if chat remains pending for n seconds');?></label>
                        <input type="text" ng-non-bindable class="form-control form-control-sm" name="auto_delay_timeout" value="<?php echo htmlspecialchars(isset($departament->bot_configuration_array['auto_delay_timeout']) ? $departament->bot_configuration_array['auto_delay_timeout'] : '');?>" />
                    </div>

				</div> 
		    </div>
			<?php endif;?>

			<div role="tabpanel" class="tab-pane" id="genericbot">
                <?php include(erLhcoreClassDesign::designtpl('lhdepartment/parts/bot_configuration.tpl.php'));?>
		    </div>

            <?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartment','managesurvey')) : ?>
			<div role="tabpanel" class="tab-pane" id="survey">
                <?php include(erLhcoreClassDesign::designtpl('lhdepartment/parts/survey_configuration.tpl.php'));?>
		    </div>
            <?php endif; ?>

			<div role="tabpanel" class="tab-pane" id="miscellaneous">

               <div class="form-group">
			    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/edit','This field is max 50 characters length and can be used for any purpose by extensions. This field is also indexed.');?></label>
			    <input type="text" ng-non-bindable class="form-control form-control-sm" name="Identifier" value="<?php echo htmlspecialchars($departament->identifier);?>" />
		       </div>

               <div class="form-group">
                   <label><input type="checkbox" name="hide_send_email" value="on" <?php if (isset($departament->bot_configuration_array['hide_send_email']) && $departament->bot_configuration_array['hide_send_email'] == 1) : ?>checked="checked"<?php endif;?> /> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/operatorsbalancing','Hide send e-mail button for operators in chat window');?></label>
               </div>

		    </div>

		    <?php include(erLhcoreClassDesign::designtpl('lhdepartment/parts/tab_content_multiinclude.tpl.php'));?>
			
		</div>
</div>

<script>
	$(function() {
		$('#custom_date_from, #custom_date_to').fdatepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
