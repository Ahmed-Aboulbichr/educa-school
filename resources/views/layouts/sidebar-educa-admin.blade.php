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
                        <i class=" fas fa-graduation-cap"></i>
                        <span>Formation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ url('formation') }}>Liste Formations</a></li>
                        <li><a href={{ url('session') }}>Sessions</a></li>
                        <li><a href={{ url('type_formations') }}>Types Formation</a></li>
                        <li><a href={{ url('niveau_etudes') }}>Niveau Etudes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-menu-fill"></i>
                        <span>Candidature</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ url('all_sessions') }}>Liste Candidatures</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-graduate"></i>
                        <span>Etudiant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ url('admin.etudiant.liste_etudiant') }}>Liste Etudiants</a></li>
                        <li><a href={{ url('admin.etudiant.re-inscription') }}>Réinscription</a></li>
                        <li><a href={{ url('admin.etudiant.reclamation') }}>Reclamation</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class=" ri-file-copy-line"></i>
                        <span>E-Document</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('edocument.index') }}">Liste Demandes</a></li>
                        <li><a href="{{ url('/edocument/archive') }}">Archive</a></li>
                        <li><a href="{{ url('/edocument/parametre') }}">Parametre</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-graduate"></i>
                        <span>Structure Formation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{url('semestreConfig')}}>Semestre</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{url('moduleConfig')}}>Module</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{url('matiereConfig')}}>Matiere</a></li>
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
                    <a class="waves-effect">
                        <i class="ri-contacts-book-line"></i>
                        <span>E-biblio</span>
                    </a>
                </li>

                <li>
                    <a  href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-user-tie"></i>
                        <span>Proffeseurs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{route('professeurs.index')}}>Liste Professeurs</a></li>
                    </ul>
                </li>

                <li>
                    <a class=" waves-effect">
                        <i class="ri-clipboard-line"></i>
                        <span>Planification</span>
                    </a>
                </li>

                <li>
                    <a class=" waves-effect">
                        <i class="ri-settings-2-line"></i>
                        <span>Paramettrage</span>
                    </a>
                </li>

                <li>
                    <a class=" waves-effect">
                        <i class="ri-exchange-funds-line"></i>
                        <span>E-DAQIQ</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
