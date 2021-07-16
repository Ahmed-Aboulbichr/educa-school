<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-menu-fill"></i>
                        <span>Candidat</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{route('getPreInscr')}}>Pre-inscription</a></li>
                        <li><a href={{route('cursus_universitaire.index')}}>mon parcours</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">

                                <span>Candidature</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href={{route('getFormations')}}>Postule</a></li>
                                <li><a href={{route('mesCandidatures')}}>Mes candidatures</a></li>
                              <!-- {{--  <li><a href={{url('admin.candidature.reclamation')}}>Reclamation</a></li>
                                <li><a href={{ route('type_formations.index') }}>Liste Candidatures</a></li> --}} -->
                            </ul>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class=" ri-file-copy-line"></i>
                        <span>E-Document</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a>Liste Demandes</a></li>
                        <li><a>Suivi Doucments</a></li>
                        <li><a>Recu Documents</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>E-Note</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a>Mes Notes</a></li>
                    </ul>
                </li>

                <li>
                    <a  class="waves-effect">
                        <i class="ri-contacts-book-line"></i>
                        <span>E-biblio</span>
                    </a>
                </li>



                <li>
                    <a  class=" waves-effect">
                        <i class="ri-clipboard-line"></i>
                        <span>Planification</span>
                    </a>
                </li>

                <li>
                    <a  class=" waves-effect">
                        <i class="ri-settings-2-line"></i>
                        <span>Paramettrage</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
