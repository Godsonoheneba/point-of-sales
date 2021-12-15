 





 <div class="left-side-menu left-side-menu-detached">

                    <div class="leftbar-user">
                        <a href="javascript: void(0);">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                            <span class="leftbar-user-name"><?php echo $fullname ?></span>
                            <span class="account-position"> ( <?php echo $username ?> ) </span>
                        </a>
                    </div>

                    <!--- Sidemenu -->
                    <ul class="metismenu side-nav">

                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href=".home.login-successful" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span> Dashboards </span>
                            </a>
                            
                        </li>

                        <li class="side-nav-title side-nav-item">Apps</li>

                        <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Purchase </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href=".login-success.add-new-purchase-apps-products.java.css.js.app.xml"> New Purchase</a>
                                </li>
                                <li>
                                    <a href=".login-success.view-all-purchase-apps-products..keyboard.java.css.js.app.xml.python">View all Purchases</a>
                                </li>
                                
                            </ul>
                        </li>

                      

                        <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Stock </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href=".login-success.add-new-stock-apps-products.java.css.js.app.xml">New Stock</a>
                                </li>
                                <li>
                                    <a href=".login-success.view-all-stocks-apps-products.java.css.js.app.xml.joerock">View All Stocks</a>
                                </li>
                               
                            </ul>
                        </li>






                         <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-briefcase"></i>
                                <span> Debtors </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href=".login-success.pay-debt-dacosta.java.css.js.app.xml.paydac">Pay Debt</a>
                                </li>
                                <li>
                                    <a href=".login-success.view.all.debtors.java.css.js.app.xml.paydac">View All Debtors</a>
                                </li>


                                <li>
                                    <a href=".login-success.view.all.paid-debts.java.css.js.app.xml.paydac">View All Paid Debts</a>
                                </li>
                               
                            </ul>
                        </li>




                          <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Accounts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href=".login-success.all-todays-sales-list-apps-products.java.css.js.app.xml.joerock.paydac">Daily Sales</a>
                                </li>
                                <!-- <li>
                                    <a href="layouts-vertical.html">All Sales</a>
                                </li> -->
                            </ul>
                        </li>




                        <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Pick Up </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href=".login-success.add-new-pick-apps-products.java.css.js.app.xml.joerock.paydac">Add Pick Up</a>
                                </li>
                                <li>
                                    <a href=".login-success.all-pick-up-and-keepings-list-apps-products.java.css.js.app.xml.joerock.paydac">View Pick Up List</a>
                                </li>
                            </ul>
                        </li>





                       

                        <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Staffs  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">


                                <?php 

                                        if ($roleDB==="1") {
                                            
                                            ?>

                                                <li>
                                                    <a href=".login-success.all-staffs-apps-products.java.css.js.app.xml.joerock.paydac">View All Staff</a>
                                                </li>
                                            <?php




                                        } else {
                                            
                                            ?>

                                                <li>
                                                <a href=".login-success.all-staff-info-apps-products.java.css.js.app.xml.joerock.paydac">View My Info</a>
                                            </li>

                                            <?php
                                        }
                                        

                                 ?>
                                
 

                                


                               <!--  <li>
                                    <a href="apps-tasks-details.html">Details</a>
                                </li>
                                <li>
                                    <a href="apps-kanban.html">Kanban Board</a>
                                </li> -->
                            </ul>
                        </li>



                       <!--  <li class="side-nav-item">
                            <a href="javascript: void(0);" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Configuration </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="side-nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="layouts-horizontal.html">Horizontal</a>
                                </li>
                                <li>
                                    <a href="layouts-vertical.html">Vertical</a>
                                </li>
                            </ul>
                        </li> -->





                        <li class="side-nav-title side-nav-item">Backups</li>


                         <li class="side-nav-item" style="cursor: pointer;">
                            <a onclick="bacupClick()" class="side-nav-link">
                                <i class="uil-rss"></i>
                                <span> Backup </span>
                            </a>
                        </li>



                         <li class="side-nav-title side-nav-item">Logout</li>


                         <li class="side-nav-item">
                            <a style="cursor: pointer;" onclick="window.location.replace('cores/logout.php')"  class="side-nav-link">
                                <i class="mdi mdi-logout"></i>
                                <span> Logout </span>
                            </a>
                        </li>

        
                    </ul>

                    <!-- Help Box -->
                  <!--   <div class="help-box text-center">
                        <a href="javascript: void(0);" class="float-right close-btn text-body">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
                        <h5 class="mt-3">Unlimited Access</h5>
                        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                        <a href="javascript: void(0);" class="btn btn-outline-primary btn-sm">Upgrade</a>
                    </div> -->
                    <!-- end Help Box -->
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

                </div>