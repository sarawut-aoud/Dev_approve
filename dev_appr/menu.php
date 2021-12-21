
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                       <!--  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                                class="hide-menu">Full Width</span></a></li> -->
                                <?php if($_SESSION["User_level"]=='1'){?>
                                    <li class="sidebar-item"> 
                                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dev_approve.php" aria-expanded="false">
                                            <i class="mdi mdi-blur-linear"></i>
                                            <span class="hide-menu">หน้าหลัก</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                
                                <li class="sidebar-item"> 

                                    <?php if($_SESSION["User_level"]=='1'){?>





                                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                            <i class="mdi mdi-receipt"></i> <span class="hide-menu">คำร้องพัฒนาระบบ </span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse  first-level">
                                            <li class="sidebar-item">
                                                <a href="add_approve.php" class="sidebar-link">
                                                 <!--  <i class="mdi mdi-note-outline"></i> -->
                                                 <span class="hide-menu">- เพิ่มคำร้องขอพัฒนาระบบ </span>
                                             </a>
                                         </li>
                                         <li class="sidebar-item">
                                            <a href="dev_approveAll.php" class="sidebar-link">
                                             <!--  <i class="mdi mdi-note-plus"></i> -->
                                             <span class="hide-menu">- สถานะคำร้อง/การพัฒนาระบบ </span>
                                         </a>
                                     </li>
                                     <li class="sidebar-item">
                                        <a href="form-wizard.html" class="sidebar-link">
                                         <!--  <i class="mdi mdi-note-plus"></i> -->
                                         <span class="hide-menu">- ประวัติการขอพัฒนาระบบ </span>
                                     </a>
                                 </li>
                             </ul>
                             <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false">
                                    <i class="mdi mdi-blur-linear"></i>
                                    <span class="hide-menu">จัดการผู้ใช้งานระบบ</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false">
                                    <i class="mdi mdi-blur-linear"></i>
                                    <span class="hide-menu">จัดการข้อมูลรายชื่อระบบ</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false">
                                    <i class="mdi mdi-blur-linear"></i>
                                    <span class="hide-menu">จัดการข้อมูลหมวดหมู่</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if($_SESSION["User_level"]=='2'){?>
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i> <span class="hide-menu">คำร้องพัฒนาระบบ </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="add_approve.php" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i>
                                        <span class="hide-menu"> เพิ่มคำร้องขอพัฒนาระบบ </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="dev_approveAll.php" class="sidebar-link">
                                        <i class="mdi mdi-note-plus"></i>
                                        <span class="hide-menu"> สถานะคำร้อง/การพัฒนาระบบ </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="form-wizard.html" class="sidebar-link">
                                        <i class="mdi mdi-note-plus"></i>
                                        <span class="hide-menu"> ประวัติการขอพัฒนาระบบ </span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>

                        <?php if($_SESSION["User_level"]=='3'){?>
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i> <span class="hide-menu">คำร้องพัฒนาระบบ </span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="add_approve.php" class="sidebar-link">
                                        <i class="mdi mdi-note-outline"></i>
                                        <span class="hide-menu"> เพิ่มคำร้องขอพัฒนาระบบ </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="dev_approveAll.php" class="sidebar-link">
                                        <i class="mdi mdi-note-plus"></i>
                                        <span class="hide-menu"> สถานะคำร้อง/การพัฒนาระบบ </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="form-wizard.html" class="sidebar-link">
                                        <i class="mdi mdi-note-plus"></i>
                                        <span class="hide-menu"> ประวัติการขอพัฒนาระบบ </span>
                                    </a>
                                </li>
                            </ul>
                        <?php } ?>






                    </li>

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>