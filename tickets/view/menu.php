<body class="body" data-spy="scroll">
<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
   </div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="index.php?controller=home&action=home" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Page d'accueil</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-apartment"></span><span class="mtext">Etudiants</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Liste étudiants</a></li>
                        <li><a href="ui-cards.html">Liste délégués</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-apartment"></span><span class="mtext">Classes</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="ui-buttons.html">Liste classes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Collaborateurs</span>
                    </a>
                </li>
                <li>
                    <a href="pages/ticket/createTicket.php" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Sections</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=ticket&action=ticketCreate" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Tickets</span>
                    </a>
                </li>
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Aide</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/img.jpg" alt="">
                                    <h3>John Doe</h3>
                                    <p>Ecran marbré</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/photo1.jpg" alt="">
                                    <h3>Lea R. Frith</h3>
                                    <p>J'arrive pas a me co svp</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/photo2.jpg" alt="">
                                    <h3>Erik L. Richards</h3>
                                    <p>PC explosé</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/photo3.jpg" alt="">
                                    <h3>John Doe</h3>
                                    <p>Manque des touches, elles ont été mangées</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/photo4.jpg" alt="">
                                    <h3>Renee I. Hansen</h3>
                                    <p>Je m'appelle Renee</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="vendors/images/img.jpg" alt="">
                                    <h3>Vicki M. Coleman</h3>
                                    <p>Ben</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-name">John Doe</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
        </div>
    </div>
</div>
