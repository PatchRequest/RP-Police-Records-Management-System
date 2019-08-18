
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    {{--
           <!-- search form -->
           <form action="#" method="get" class="sidebar-form">
               <div class="input-group">
                   <input type="text" name="q" class="form-control" placeholder="Search...">
                   <span class="input-group-btn">
                   <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                   </button>
                 </span>
               </div>
           </form>

     --}}

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>


            <li><a href="/user/{{auth()->user()->id}}"><i class="fa fa-folder-open"></i> <span>Meine Akte</span></a></li>





            <li class="treeview">

                <a href="#">
                    <i class="fa fa-book"></i> <span>Dokumente</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                </a>
                <ul class="treeview-menu">
                    @foreach($documents as $document)

                        <li><a href="{{ $document->url }}" target="_blank"><i class="fa fa-circle-o"></i> {{ $document->name }}</a></li>


                    @endforeach

                    @can("manage documents")
                            <li>
                                <a class="dropdown-item" href="/document/manage" class="fa fa-circle-o">Verwalte Dokumente</a>
                            </li>

                    @endcan

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Bewertungen</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="/rating/ask"><i class="fa fa-binoculars"></i> Anfordern</a></li>
                    <li><a href="/rating/create"><i class="fa fa-envelope-o"></i> Abgeben</a></li>
                    <li><a href="/rating/forMe"><i class="fa fa-bell-o"></i> Forderungen an Dich</a></li>

                </ul>
            </li>



            @can('manage news')
            <li><a href="/news/create"><i class="fa fa-laptop"></i> <span>News verwalten</span></a></li>



            @endcan

            @if(auth()->user()->can('edit permissions') || auth()->user()->can('create users') || auth()->user()->can('show ratings') )


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Admin-Panel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">




                    @can("create users")
                    <li><a href="/user/create"><i class="fa fa-user-plus"></i> User Erstellen</a></li>
                    @endcan
                    @can('show ratings')
                    <li><a href="/rating"><i class="fa fa-trophy"></i> Alle Bewertungen</a></li>
                    @endcan
                    @can("edit permissions")
                    <li><a href="/permissions"><i class="fa fa-eye"></i> Rechte System</a></li>
                    @endcan
                    <li><a href="/user"><i class="fa fa-users"></i> Alle User</a></li>
                </ul>
            </li>


            @endif




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
