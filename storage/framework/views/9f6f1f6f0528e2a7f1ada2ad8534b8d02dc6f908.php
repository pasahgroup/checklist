
<br>
<!-- <div class="text-center text-primary">
                    <strong style="color:#0a0215;"><?php echo e($company->company_name??'Set Company Profile'); ?></strong>
              </div> -->

    <div id="accordion" style="background-color:#f4f4f4; !important">
        <div class="text-center text-primary"><hr>
        </div>

<ul class="nav flex-column">
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'GeneralAdmin|SuperAdmin|GeneralManager|Manager')): ?>
<li class="nav-item
<?php echo e((request()->is('dash-property/{id}')) ? 'active' : ''); ?>

<?php echo e((request()->is('admin')) ? 'active' : ''); ?>

">
    <a class="nav-link" data-toggle="collapse" href="#Report" role="button"
    aria-expanded="false" aria-controls="Report">
          <span class="svg-icon nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
        <span class="btn-sm">Dashboard</span>
        <i class="fas fa-chevron-right fa-rotate-90"></i>
    </a>
    <div class="collapse nav-collapse
    <?php echo e((request()->is('dash-property/{id}')) ? 'show' : ''); ?>

	<?php echo e((request()->is('admin')) ? 'show' : ''); ?>

    " id="Report"  data-parent="#accordion">
        <ul class="nav flex-column">
               <li class="nav-item <?php echo e((request()->is('dash-property/{id}')) ? 'sub-active' : ''); ?>">

<a href="/dash-property/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('dash-property/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Register Company Property">Properties</span>
                                </a>
                         </li>


        </ul>
    </div>
</li>
  <?php endif; ?>

<?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin|GeneralAdmin|GeneralManager|Manager|Admin|Maintenancier|HouseKeeper')): ?>
  <li class="nav-item
            <?php echo e((request()->is('weekly')) ? 'active' : ''); ?>

            <?php echo e((request()->is('managers-inspection/{id}')) ? 'active' : ''); ?>

              <?php echo e((request()->is('dashboard-checklistx')) ? 'active' : ''); ?>

            ">

                <a class="nav-link" data-toggle="collapse" href="#accordionChecklist" role="button"
                aria-expanded="false" aria-controls="accordionChecklist">
                    <span class="svg-icon nav-icon">
                        <i class="fas fa-door-open font-size-h4"></i>
                    </span>
                    <span class="btn-sm">Inspections</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                 </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('weekly')) ? 'show' : ''); ?>

                  <?php echo e((request()->is('managers-inspection/{id}')) ? 'show' : ''); ?>

                    <?php echo e((request()->is('dashboard-checklistx')) ? 'show' : ''); ?>

                " id="accordionChecklist" data-parent="#accordion">
                    <div id="accordion">
                        <ul class="nav flex-column">


                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin|GeneralAdmin|GeneralManager|Admin|HouseKeeper|Maintenancier')): ?>
                               <li class="nav-item <?php echo e((request()->is('daily')) ? 'sub-active' : ''); ?>">
                                <a href="/daily" class="nav-link sub-nav-link <?php echo e((request()->is('daily')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">Daily</span>
                                </a>
                            </li>


                             <li class="nav-item <?php echo e((request()->is('weekly')) ? 'sub-active' : ''); ?>">
                                <a href="/weekly" class="nav-link sub-nav-link <?php echo e((request()->is('weekly')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">Weekly</span>
                                </a>
                            </li>


            <?php endif; ?>


<?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin|GeneralAdmin|GeneralManager|Manager|Admin')): ?>


                              <li class="nav-item <?php echo e((request()->is('daily-duty-manager')) ? 'sub-active' : ''); ?>">
                                <a href="/daily-duty-manager" class="nav-link sub-nav-link <?php echo e((request()->is('daily-duty-manager')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">Daily Duty Manager</span>
                                </a>
                            </li>
                            
                         <li class="nav-item <?php echo e((request()->is('managers-inspection')) ? 'sub-active' : ''); ?>">
                          <a href="/managers-inspection" class="nav-link sub-nav-link <?php echo e((request()->is('managers-inspection')) ? 'active' : ''); ?>">
                              <span class="svg-icon nav-icon d-flex justify-content-center">
                                  <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    </svg>
                              </span>
                              <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">Clearence</span>
                          </a>
                   </li>
          <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </li>
    <?php endif; ?>


<?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin|GeneralAdmin|GeneralManager|Manager|Admin|MaintenanceReport')): ?>
<li class="nav-item
<?php echo e((request()->is('report-general/{id}/dashboard')) ? 'active' : ''); ?>

<?php echo e((request()->is('admin')) ? 'active' : ''); ?>


">
    <a  class="nav-link" data-toggle="collapse" href="#Report" role="button"
    aria-expanded="false" aria-controls="Report">
        <span class="svg-icon nav-icon">
            <i class="fas fa-chart-line font-size-h4" ></i>
        </span>
        <span class="btn-sm">Report</span>
        <i class="fas fa-chevron-right fa-rotate-90"></i>
    </a>
    <div class="collapse nav-collapse
    <?php echo e((request()->is('report-general/{id}/dashboard')) ? 'show' : ''); ?>

      <?php echo e((request()->is('admin')) ? 'show' : ''); ?>


    " id="Report"  data-parent="#accordion">
        <ul class="nav flex-column">

            <li class="nav-item <?php echo e((request()->is('report-general/{id}/dashboard')) ? 'sub-active' : ''); ?><?php echo e((request()->is('filter-report-general/{id}/dashboard')) ? 'sub-active' : ''); ?>">
                
                <a href="/report-general/<?php echo e($property->id ?? 0); ?>/dashboard" class="nav-link sub-nav-link <?php echo e((request()->is('report-general/{id}/dashboard')) ? 'active' : ''); ?> <?php echo e((request()->is('filter-report-general/{id}/dashboard')) ? 'active' : ''); ?> ">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          </svg>
                    </span>
                    <span class="nav-text">General report</span>
                </a>
            </li>
            <li class="nav-item <?php echo e((request()->is('admin')) ? 'sub-active' : ''); ?><?php echo e((request()->is('filter-admin')) ? 'sub-active' : ''); ?>">
                <a href="/admin" class="nav-link sub-nav-link <?php echo e((request()->is('admin')) ? 'active' : ''); ?> <?php echo e((request()->is('filter-admin')) ? 'active' : ''); ?> ">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          </svg>
                    </span>
                    <span class="nav-text">Summarized report</span>
                </a>
            </li>

           <!--    <li class="nav-item <?php echo e((request()->is('summary-report/{id}')) ? 'sub-active' : ''); ?><?php echo e((request()->is('filter-admin')) ? 'sub-active' : ''); ?>">
                <a href="/summary-report/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('summary-report/{id}')) ? 'active' : ''); ?> <?php echo e((request()->is('filter-admin')) ? 'active' : ''); ?> ">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          </svg>
                    </span>
                    <span class="nav-text">Summary-report</span>
                </a>
            </li> -->

          <!--   <li class="nav-item <?php echo e((request()->is('dashboard-checklistx')) ? 'sub-active' : ''); ?><?php echo e((request()->is('filter-admin')) ? 'sub-active' : ''); ?>">
                <a href="/dashboard-checklistx" class="nav-link sub-nav-link <?php echo e((request()->is('dashboard-checklistx')) ? 'active' : ''); ?> <?php echo e((request()->is('filter-admin')) ? 'active' : ''); ?> ">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          </svg>
                    </span>
                    <span class="nav-text">Not answered</span>
                </a>
            </li> -->
        </ul>
    </div>
</li>
<?php endif; ?>

 <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'GeneralManager')): ?>
 <li class="nav-item <?php echo e((request()->is('managers-inspection/{id}')) ? 'sub-active' : ''); ?>">
  <a href="/managers-inspection/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('managers-inspection/{id}')) ? 'active' : ''); ?>">
      <span class="svg-icon nav-icon d-flex justify-content-center">
          <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            </svg>
      </span>
      <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">Inspection 2</span>
  </a>
</li>
<?php endif; ?>

 <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'SuperAdmin')): ?>
<br>
            <li class="nav-item
            <?php echo e((request()->is('assign-indicator/{id}')) ? 'active' : ''); ?>

            <?php echo e((request()->is('qnsapplied')) ? 'active' : ''); ?>

            <?php echo e((request()->is('indicator/{id}')) ? 'active' : ''); ?>

             <?php echo e((request()->is('riq-Datatype')) ? 'active' : ''); ?>

            ">
                <a class="nav-link" data-toggle="collapse" href="#Indicatorsettings" role="button"
                aria-expanded="false" aria-controls="Indicatorsettings">
                    <span class="svg-icon nav-icon">
                        <i class="fab fa-asymmetrik font-size-h4"></i>
                    </span>
                    <span class="btn-sm">Indicator Settings</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                 </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('assign-indicator/{id}')) ? 'show' : ''); ?>

                  <?php echo e((request()->is('qnsapplied')) ? 'show' : ''); ?>

                <?php echo e((request()->is('indicator/{id}')) ? 'show' : ''); ?>

                <?php echo e((request()->is('riq-Datatype')) ? 'show' : ''); ?>

                " id="Indicatorsettings" data-parent="#accordion">
                    <div id="accordion">
                        <ul class="nav flex-column">

                              <li class="nav-item <?php echo e((request()->is('assign-indicator/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/assign-indicator/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('assign-indicator/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Indicators to Metaname">AIM</span>
                                </a>
                         </li>

                         <li class="nav-item <?php echo e((request()->is('qnsapplied')) ? 'sub-active' : ''); ?>">
                           <a href="/qnsapplied" class="nav-link sub-nav-link <?php echo e((request()->is('qnsapplied')) ? 'active' : ''); ?>">
                               <span class="svg-icon nav-icon d-flex justify-content-center">
                                   <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                       <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                     </svg>
                               </span>
                               <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Applied Indicators to Department">AID</span>
                           </a>
                       </li>

                           <li class="nav-item <?php echo e((request()->is('indicator/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/indicator/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('indicator/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Register Indicators Questions">RIQ</span>
                                </a>
                         </li>

                       <li class="nav-item <?php echo e((request()->is('riq-Datatype')) ? 'sub-active' : ''); ?>">
                                <a href="/riq-Datatype" class="nav-link sub-nav-link <?php echo e((request()->is('riq-Datatype')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                     <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Edit metaname datatype">Edit RIQ datatype</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>


    <li class="nav-item
           <?php echo e((request()->is('metadata')) ? 'active' : ''); ?>

           <?php echo e((request()->is('metaname')) ? 'active' : ''); ?>

             <?php echo e((request()->is('sessionm')) ? 'active' : ''); ?>

            ">
                <a  class="nav-link" data-toggle="collapse" href="#settingrM" role="button"
                aria-expanded="false" aria-controls="settingrM">
                    <span class="svg-icon nav-icon">
                    <i class="fas fa-solid fa-coins"></i>
                    </span>
                    <span class="btn-sm">Metaname Settings</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('metadata')) ? 'show' : ''); ?>

                <?php echo e((request()->is('metaname')) ? 'show' : ''); ?>

                   <?php echo e((request()->is('sessionm')) ? 'show' : ''); ?>

                " id="settingrM" data-parent="#accordionrm">
                    <div id="accordionrm">
                        <ul class="nav flex-column">


                            <li class="nav-item <?php echo e((request()->is('metadata')) ? 'sub-active' : ''); ?>">
                                <a href="/metadata" class="nav-link sub-nav-link <?php echo e((request()->is('metadata')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Metadata</span>
                                </a>
                            </li>

                               <li class="nav-item <?php echo e((request()->is('metaname')) ? 'sub-active' : ''); ?>">
                                <a href="/metaname" class="nav-link sub-nav-link <?php echo e((request()->is('metaname')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Metaname</span>
                                </a>
                            </li>


   <li class="nav-item <?php echo e((request()->is('sessionm')) ? 'sub-active' : ''); ?>">
                                <a href="<?php echo e(route('sessionm.index')); ?>" class="nav-link sub-nav-link <?php echo e((request()->is('sessionm')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Add section</span>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            </li>


     <li class="nav-item
            <?php echo e((request()->is('user-activity/{id}')) ? 'active' : ''); ?>

            <?php echo e((request()->is('assign-roles/{id}')) ? 'active' : ''); ?>

           <?php echo e((request()->is('assign-roles-user/{id}')) ? 'active' : ''); ?>

            <?php echo e((request()->is('activity-roles/{id}')) ? 'active' : ''); ?>

            ">
                <a  class="nav-link" data-toggle="collapse" href="#settingr" role="button"
                aria-expanded="false" aria-controls="settingr">
                    <span class="svg-icon nav-icon">
                        <i class="fas far fa-user-tag"></i>
                    </span>
                    <span class="btn-sm">Roles & Permission</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('user-activity/{id}')) ? 'show' : ''); ?>

                <?php echo e((request()->is('assign-roles/{id}')) ? 'show' : ''); ?>

                <?php echo e((request()->is('assign-roles-user/{id}')) ? 'show' : ''); ?>

                <?php echo e((request()->is('activity-roles/{id}')) ? 'show' : ''); ?>

                " id="settingr" data-parent="#accordionx">
                    <div id="accordionx">
                        <ul class="nav flex-column">

     <li class="nav-item <?php echo e((request()->is('activity-roles/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/activity-roles/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('activity-roles/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Attach activities to roles">AARos</span>
                                </a>
    </li>


  <li class="nav-item <?php echo e((request()->is('assign-roles/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/assign-roles/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('assign-roles/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                     <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign roles to department">ARoDe</span>
                                </a>
    </li>

     <li class="nav-item <?php echo e((request()->is('assign-roles-user/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/assign-roles-user/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('assign-roles-user/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                     <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign roles to User">ARoU</span>
                                </a>
    </li>

     <li class="nav-item <?php echo e((request()->is('user-activity/{id}')) ? 'sub-active' : ''); ?>">
                                <a href="/user-activity/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('user-activity/{id}')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text" data-toggle="tooltip" data-placement="bottom" title="Assign Activities to User">AAU</span>
                                </a>
    </li>



                        </ul>
                    </div>
                </div>
            </li>
  <?php endif; ?>
 <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'GeneralAdmin|SuperAdmin')): ?>
            <li class="nav-item
            <?php echo e((request()->is('user-register')) ? 'active' : ''); ?>

            <?php echo e((request()->is('role-register')) ? 'active' : ''); ?>

            <?php echo e((request()->is('users')) ? 'active' : ''); ?>

              <?php echo e((request()->is('assign-roles')) ? 'active' : ''); ?>

            ">
                <a  class="nav-link" data-toggle="collapse" href="#setting" role="button"
                aria-expanded="false" aria-controls="setting">
                    <span class="svg-icon nav-icon">
                        <i class="fas fa-cogs font-size-h4"></i>
                    </span>
                    <span class="btn-sm">General Settings</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('user-register')) ? 'show' : ''); ?>

                <?php echo e((request()->is('role-register')) ? 'show' : ''); ?>

                  <?php echo e((request()->is('assign-roles')) ? 'show' : ''); ?>

                <?php echo e((request()->is('users')) ? 'show' : ''); ?>

                " id="setting" data-parent="#accordiond">
                    <div id="accordiond">
                        <ul class="nav flex-column">                            

                              <li class="nav-item <?php echo e((request()->is('role-register')) ? 'sub-active' : ''); ?>">
                                <a href="<?php echo e(route('role-register.index')); ?>" class="nav-link sub-nav-link <?php echo e((request()->is('role-register')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Add role</span>
                                </a>
                            </li>

                              <li class="nav-item <?php echo e((request()->is('user-register')) ? 'sub-active' : ''); ?>">
                                <a href="<?php echo e(route('user-register.index')); ?>" class="nav-link sub-nav-link <?php echo e((request()->is('user-register')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Add user</span>
                                </a>
                            </li>


                            <li class="nav-item <?php echo e((request()->is('users')) ? 'sub-active' : ''); ?>">
                                <a href="/users" class="nav-link sub-nav-link <?php echo e((request()->is('users')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Users</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
     <?php endif; ?>

     <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'GeneralAdmin|SuperAdmin')): ?>
                <li class="nav-item
                <?php echo e((request()->is('properties')) ? 'active' : ''); ?>

                <?php echo e((request()->is('asset/{id}')) ? 'active' : ''); ?>

                  <?php echo e((request()->is('assets_')) ? 'active' : ''); ?>

               <?php echo e((request()->is('company-profile')) ? 'active' : ''); ?>

                <?php echo e((request()->is('department')) ? 'active' : ''); ?>

                ">
                    <a  class="nav-link" data-toggle="collapse" href="#settingrp" role="button"
                    aria-expanded="false" aria-controls="settingrp">
                        <span class="svg-icon nav-icon">
                            <i class="fas fa-cogs font-size-h4"></i>
                        </span>
                        <span class="btn-sm">Company Profile</span>
                        <i class="fas fa-chevron-right fa-rotate-90"></i>
                    </a>

                    <div class="collapse nav-collapse
                    <?php echo e((request()->is('properties')) ? 'show' : ''); ?>

                    <?php echo e((request()->is('asset/{id}')) ? 'show' : ''); ?>

                        <?php echo e((request()->is('assets_')) ? 'show' : ''); ?>

                    <?php echo e((request()->is('company-profile')) ? 'show' : ''); ?>

                    <?php echo e((request()->is('department')) ? 'show' : ''); ?>

                    " id="settingrp" data-parent="#accordionxp">
                        <div id="accordionxp">
                            <ul class="nav flex-column">
                    <ul class="nav flex-column">
                          <li class="nav-item <?php echo e((request()->is('company-profile')) ? 'sub-active' : ''); ?>">
                                         <a href="/company-profile" class="nav-link sub-nav-link <?php echo e((request()->is('company-profile')) ? 'active' : ''); ?>">
                                             <span class="svg-icon nav-icon d-flex justify-content-center">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                   </svg>
                                             </span>
                                             <span class="nav-text">Profile</span>
                                         </a>
                                     </li>

                <li class="nav-item <?php echo e((request()->is('properties')) ? 'sub-active' : ''); ?>">
                                         <a href="/properties" class="nav-link sub-nav-link <?php echo e((request()->is('properties')) ? 'active' : ''); ?>">
                                             <span class="svg-icon nav-icon d-flex justify-content-center">
                                                 <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                   </svg>
                                             </span>
                                             <span class="nav-text">Properties</span>
                                         </a>
                                     </li>

                <li class="nav-item <?php echo e((request()->is('asset/{id}')) ? 'sub-active' : ''); ?>">
                                         <a href="/asset/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('asset/{id}')) ? 'active' : ''); ?>">
                                             <span class="svg-icon nav-icon d-flex justify-content-center">
                                                 <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                   </svg>
                                             </span>
                                             <span class="nav-text">Assets</span>
                                         </a>
                                     </li>

                                     <li class="nav-item <?php echo e((request()->is('assets_')) ? 'sub-active' : ''); ?>">
                                                              <a href="/assets_" class="nav-link sub-nav-link <?php echo e((request()->is('assets_')) ? 'active' : ''); ?>">
                                                                  <span class="svg-icon nav-icon d-flex justify-content-center">
                                                                      <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                        </svg>
                                                                  </span>
                                                                  <span class="nav-text">Asset Edit</span>
                                                              </a>
                                                          </li>

                                     <li class="nav-item <?php echo e((request()->is('department')) ? 'sub-active' : ''); ?>">
                                       <a href="/department" class="nav-link sub-nav-link <?php echo e((request()->is('department')) ? 'active' : ''); ?>">
                                           <span class="svg-icon nav-icon d-flex justify-content-center">
                                               <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                   <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                 </svg>
                                           </span>
                                           <span class="nav-text">Departments</span>
                                       </a>
                                   </li>
                                   </ul>






                            </ul>
                        </div>
                    </div>
                </li>
         <?php endif; ?>

         <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
          <li class="nav-item <?php echo e((request()->is('report-action/{id}/dashboard')) ? 'sub-active' : ''); ?>">
                                         <a href="/report-action/{id}/dashboard" class="nav-link sub-nav-link <?php echo e((request()->is('report-action/{id}/dashboard')) ? 'active' : ''); ?>">
                                             <span class="svg-icon nav-icon d-flex justify-content-center">
                                                 <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                 </svg>
                                             </span>
                                             <span class="nav-text">Actions</span>
                                         </a>
                                     </li>
                                   <?php endif; ?>

  <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
         <li class="nav-item <?php echo e((request()->is('asset/{id}')) ? 'sub-active' : ''); ?>">
                                  <a href="/asset/{id}" class="nav-link sub-nav-link <?php echo e((request()->is('asset/{id}')) ? 'active' : ''); ?>">
                                      <span class="svg-icon nav-icon d-flex justify-content-center">
                                          <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            </svg>
                                      </span>
                                      <span class="nav-text">Assets</span>
                                  </a>
                              </li>
                            <?php endif; ?>

  <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'GeneralAdmin|SuperAdmin')): ?>
  <br>
            <li class="nav-item
            <?php echo e((request()->is('recovery-department')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-property')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-metadata')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-metaname')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-role')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-user')) ? 'active' : ''); ?>

            <?php echo e((request()->is('recovery-asset')) ? 'active' : ''); ?>

            ">

                <a  class="nav-link" data-toggle="collapse" href="#datarec" role="button"
                aria-expanded="false" aria-controls="datarec">
                    <span class="svg-icon nav-icon">
                        <i class="fas fa-solid fa-database"></i>
                    </span>
                    <span class="btn-sm">Data Recovery</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                </a>

                <div class="collapse nav-collapse
                <?php echo e((request()->is('recovery-department')) ? 'show' : ''); ?>

                <?php echo e((request()->is('recovery-property')) ? 'show' : ''); ?>

                <?php echo e((request()->is('recovery-metadata')) ? 'show' : ''); ?>

                <?php echo e((request()->is('recovery-metaname')) ? 'show' : ''); ?>

                <?php echo e((request()->is('recovery-role')) ? 'show' : ''); ?>

                <?php echo e((request()->is('recovery-user')) ? 'show' : ''); ?>

                  <?php echo e((request()->is('recovery-asset')) ? 'show' : ''); ?>


                            " id="datarec" data-parent="#accordions">
                    <div id="accordions">
                        <ul class="nav flex-column">

                              <li class="nav-item <?php echo e((request()->is('recovery-asset')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-asset" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-asset')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Asset Recovery</span>
                                </a>
                            </li>

                            <li class="nav-item <?php echo e((request()->is('recovery-department')) ? 'sub-active' : ''); ?>">
                              <a href="/recovery-department" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-department')) ? 'active' : ''); ?>">
                                  <span class="svg-icon nav-icon d-flex justify-content-center">
                                      <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        </svg>
                                  </span>
                                  <span class="nav-text">Department Recovery</span>
                              </a>
                          </li>

                            <li class="nav-item <?php echo e((request()->is('recovery-property')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-property" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-property')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Property Data Recovery</span>
                                </a>
                            </li>


                            <li class="nav-item <?php echo e((request()->is('recovery-metadata')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-metadata" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-metadata')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Metadata Recovery</span>
                                </a>
                            </li>


                            <li class="nav-item <?php echo e((request()->is('recovery-metaname')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-metaname" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-metaname')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Metaname Recovery</span>
                                </a>
                            </li>
                            <li class="nav-item <?php echo e((request()->is('recovery-role')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-role" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-role')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">Role Recovery</span>
                                </a>
                            </li>

                             <li class="nav-item <?php echo e((request()->is('recovery-user')) ? 'sub-active' : ''); ?>">
                                <a href="/recovery-user" class="nav-link sub-nav-link <?php echo e((request()->is('recovery-user')) ? 'active' : ''); ?>">
                                    <span class="svg-icon nav-icon d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          </svg>
                                    </span>
                                    <span class="nav-text">User Recovery</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php endif; ?>
            <!-- <div style="margin: 100px 10px 10px 10px">
                <div class="text-center text-primary"><hr>
                    <strong>Checklist Master</strong>
                    <img style="height: 20px;" alt="Logo" src="../../assets/images/misc/moran.png" /></div>
              </div> -->

                            </ul>

    </div>
<?php /**PATH C:\xampp\htdocs\checkmaster\resources\views/layouts/nav.blade.php ENDPATH**/ ?>