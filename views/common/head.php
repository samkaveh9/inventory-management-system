<header class="header">
        <section class="sidebar-header bg-gray">
            <section class="display-flex justify-content-between flex-md-column-reverse px-2">
                <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
                <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>

            </section>
        </section>
        <section class="body-header" id="body-header">
            <section class="display-flex justify-content-between">
                <section></section>
                <section>
                    <span class="ml-three ml-md-five position-relative">
                        <span id="header-profile-toggle" class="pointer">
                            <span class="header-username" style="margin-left: 1rem;"><?= $_SESSION["name"]; ?></span>
                    <i class="fas fa-angle-down"></i>
                    </span>
                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-sign-out-alt"></i>خروج
                            </a>
                        </section>
                    </section>
                    </span>
                </section>
            </section>
        </section>
    </header>