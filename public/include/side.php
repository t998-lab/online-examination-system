<?php
include("../category_class.php");
$cat=$c->read();
?>
<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                <div class="sidebar-heading">APPLICAIENTS</div>
                                <ul class="sidebar-menu sm-active-button-bg">
                                    <li class="sidebar-menu-item active">
                                        <a class="sidebar-menu-button" href="student-dashboard.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> Student
                                        </a>
                                    </li>
                                                                    </ul>
                                <!-- Account menu -->
                                <div class="sidebar-heading">Account</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>
                                            Student Account
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu sm-indent collapse" id="account_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="student-account-edit.php">
                                                    <span class="sidebar-menu-text">Edit Account</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="history.php">
                                                    <span class="sidebar-menu-text">My Exam History</span>
                                                </a>
                                            </li>
                                                                                                                            </ul>
                                                                                    <br>
                                    </li>
                                  <div class="sidebar-heading"> Exam </div>
                                <ul class="sidebar-menu sm-active-button-bg">
                                                                        <li class="sidebar-menu-item">
                                                                            <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#forum_menu">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i>
                                         Exam Cataguray                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu sm-indent collapse" id="forum_menu">
                                  <?php
				    if($cat)
                                    foreach($cat AS $row)
                                    {
                                    echo '<li class="sidebar-menu-item">';
                                    echo '<a class="sidebar-menu-button" href="student-my-exam.php?id='.$row['cat_id'].'&n='.$row['cat_name'].'">';
                                    echo '<span class="sidebar-menu-text">';
                                    echo $row["cat_name"];
                                    echo'</span>';
                                    echo '</a>';
                                    echo '</li>';
                                    }
                                    ?>




                                                                             </ul>
                                    </li>

                                  <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="#">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                        </a>
                                    </li>
                                </ul>




        </div>
    </div>
                    </div></div>
