<?php
$currentUrl = $this->uri->segment(1, 0);
$currentPage = $this->uri->segment(2, 0);
if (empty($currentPage)) {
    $currentPage = $this->uri->segment(1, 0);
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>EIP Client Portal</title>
    <meta name="description" content="" />

    <!-- Data Table CSS -->
   
    <link href="<?= base_url() ?>dist/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://www.epeaeis.com/assets/images/favicon.png">
    <link rel="icon" href="https://www.epeaeis.com/assets/images/favicon.png" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="<?= base_url() ?>dist/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>dist/css/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="<?= base_url() ?>dist/css/jquery.toast.min.css" rel="stylesheet"
        type="text/css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: "#1A1549", // Existing primary color
                        secondary: "#1A1549", // Match primary color
                        accent: "#1A1549", // Match primary
                        success: "#10b981",
                        warning: "#f59e0b",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1e293b",
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(0,0,0,0.08)',
                        'inner-light': 'inset 0 2px 4px 0 rgba(255, 255, 255, 0.3)',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                },
            },
        };
        // Initialize theme before page render to avoid flash
        (function () {
            const theme = localStorage.getItem('theme');
            if (theme === 'light') {
                //document.documentElement.classList.remove('dark');
            } else {
                // Default to dark theme
                // document.documentElement.classList.add('dark');
                // if (!theme) {
                //     localStorage.setItem('theme', 'dark');
                // }
            }
        })();
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .glass {
                @apply bg-white/70 backdrop-blur-lg border border-white/20 shadow-sm dark:bg-slate-900/70 dark:border-slate-700/30;
            }
            .card-hover {
                @apply transition-all duration-300 hover:-translate-y-1 hover:shadow-soft;
            }
        }
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            @apply bg-slate-300 dark:bg-slate-600 rounded-full;
        }
        ::-webkit-scrollbar-thumb:hover {
            @apply bg-slate-400 dark:bg-slate-500;
        }
        .sidebar-text {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        #sidebar {
            transition: width 0.3s ease;
        }
    </style>

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>dist/css/style.css?v=2.0.0" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>dist/css/custom.css?v=2.0.1" rel="stylesheet" type="text/css">

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src=https://www.googletagmanager.com/gtag/js?id=UA-144281944-1></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144281944-1');
    </script>

</head>

<body
    class="bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-300 font-sans antialiased h-screen flex overflow-hidden selection:bg-primary/20 selection:text-primary">

    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- Modern Sidebar -->
    <aside id="sidebar"
        class="w-[250px] text-white hidden md:flex flex-col transition-all duration-300 z-20 relative overflow-hidden"
        style="background-color: #1A1549;">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-primary rounded-full blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent rounded-full blur-[60px]"></div>
        </div>
        <div id="sidebar_header"
            class="h-20 flex items-center px-8 z-10 border-bottom relative transition-all duration-300">
            <div class="relative w-full h-full flex items-center justify-center">
                <a class="navbar-brand font-extrabold text-2xl tracking-tight text-white sidebar-text w-full whitespace-nowrap"
                    href="https://epicipprojects.com/legaladvertisers.co.uk/client-portal/users/dashboard">
                    Client Portal
                </a>
                <a class="navbar-brand font-extrabold text-3xl tracking-tight text-white sidebar-logo-short absolute left-0 w-full text-center opacity-0 invisible transition-all duration-300 top-1/2 -translate-y-1/2 z-50"
                    href="https://epicipprojects.com/legaladvertisers.co.uk/client-portal/users/dashboard">
                    CP
                </a>
            </div>
        </div>
        <nav class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 space-y-2 custom-scrollbar z-10">

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "dashboard") {
                echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
            } else {
                echo 'text-slate-400 hover:text-white hover:bg-white/5';
            } ?> transition-all"
                href="<?= base_url() ?>users/dashboard">
                <?php if ($currentPage == "dashboard") { ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                <?php } ?>
                <span
                    class="material-symbols-outlined text-[22px] <?php if ($currentPage == "dashboard") {
                        echo 'text-white';
                    } ?> transition-colors">dashboard</span>
                <span class="text-sm font-medium relative sidebar-text">Dashboard</span>
            </a>

            <?php if ($client_info->row()->AccountIsOnHold == '1') { ?>
                <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "active_cases") {
                    echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
                } else {
                    echo 'text-slate-400 hover:text-white hover:bg-white/5';
                } ?> transition-all"
                    href="<?= base_url() ?>orders/active_cases">
                    <?php if ($currentPage == "active_cases") { ?>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                    <?php } ?>
                    <span class="material-symbols-outlined text-[22px]">folder_open</span>
                    <span class="text-sm font-medium sidebar-text">Cases</span>
                </a>

                <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "orders") {
                    echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
                } else {
                    echo 'text-slate-400 hover:text-white hover:bg-white/5';
                } ?> transition-all"
                    href="<?= base_url() ?>orders">
                    <?php if ($currentPage == "orders") { ?>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                    <?php } ?>
                    <span class="material-symbols-outlined text-[22px]">add_circle</span>
                    <span class="text-sm font-medium sidebar-text">Place Order</span>
                </a>

                <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "drafts") {
                    echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
                } else {
                    echo 'text-slate-400 hover:text-white hover:bg-white/5';
                } ?> transition-all"
                    href="<?= base_url() ?>orders/drafts">
                    <?php if ($currentPage == "drafts") { ?>
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                    <?php } ?>
                    <span class="material-symbols-outlined text-[22px]">draft</span>
                    <span class="text-sm font-medium sidebar-text">Saved Drafts</span>
                </a>
            <?php } ?>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "quotation") {
                echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
            } else {
                echo 'text-slate-400 hover:text-white hover:bg-white/5';
            } ?> transition-all"
                href="<?= base_url() ?>orders/quotation">
                <?php if ($currentPage == "quotation") { ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                <?php } ?>
                <span class="material-symbols-outlined text-[22px]">pending_actions</span>
                <span class="text-sm font-medium sidebar-text">View Pending Quotes</span>
            </a>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "track_order" || $currentPage == "all_orders") {
                echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
            } else {
                echo 'text-slate-400 hover:text-white hover:bg-white/5';
            } ?> transition-all"
                href="<?= base_url() ?>orders/all_orders">
                <?php if ($currentPage == "track_order" || $currentPage == "all_orders") { ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                <?php } ?>
                <span class="material-symbols-outlined text-[22px]">timeline</span>
                <span class="text-sm font-medium sidebar-text">Track Orders</span>
            </a>

            <?php if ($client_info->row()->AccountIsOnHold == '1') {
                if ($client_info->row()->ContactEmail == $this->session->userdata('fc_session_client_email') && $client_info->row()->multiuser == 'Yes') { ?>
                    <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "users_list") {
                        echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
                    } else {
                        echo 'text-slate-400 hover:text-white hover:bg-white/5';
                    } ?> transition-all"
                        href="<?= base_url() ?>users/users_list">
                        <?php if ($currentPage == "users_list") { ?>
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                        <?php } ?>
                        <span class="material-symbols-outlined text-[22px]">group</span>
                        <span class="text-sm font-medium sidebar-text">Users List</span>
                    </a>
                    <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "add_user") {
                        echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
                    } else {
                        echo 'text-slate-400 hover:text-white hover:bg-white/5';
                    } ?> transition-all"
                        href="<?= base_url() ?>users/add_user">
                        <?php if ($currentPage == "add_user") { ?>
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                        <?php } ?>
                        <span class="material-symbols-outlined text-[22px]">person_add</span>
                        <span class="text-sm font-medium sidebar-text">Add New User</span>
                    </a>
                <?php }
            } ?>

            <p class="px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest mt-8 mb-2 sidebar-text">
                ACCOUNT</p>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "view_profile") {
                echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
            } else {
                echo 'text-slate-400 hover:text-white hover:bg-white/5';
            } ?> transition-all"
                href="<?= base_url() ?>users/view_profile">
                <?php if ($currentPage == "view_profile") { ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                <?php } ?>
                <span class="material-symbols-outlined text-[22px]">person</span>
                <span class="text-sm font-medium sidebar-text">View Profile</span>
            </a>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl <?php if ($currentPage == "video_supports") {
                echo 'bg-white/10 text-white shadow-lg relative overflow-hidden';
            } else {
                echo 'text-slate-400 hover:text-white hover:bg-white/5';
            } ?> transition-all"
                href="<?= base_url() ?>orders/video_supports">
                <?php if ($currentPage == "video_supports") { ?>
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500 rounded-l-xl"></div>
                <?php } ?>
                <span class="material-symbols-outlined text-[22px]">video_library</span>
                <span class="text-sm font-medium sidebar-text">Video Support</span>
            </a>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition-all"
                href="mailto:customer.service@epicads.co.uk">
                <span class="material-symbols-outlined text-[22px]">headset_mic</span>
                <span class="text-sm font-medium sidebar-text">Email Support</span>
            </a>

            <a class="group flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-white/5 transition-all pointer-events-none"
                href="#" >
                <span class="material-symbols-outlined text-[22px]">visibility</span>
                <span class="text-sm font-medium sidebar-text flex-1">Changelog</span>
                <span class="text-[10px] font-bold bg-red-500 text-white px-2 py-0.5 rounded-full sidebar-text">V
                    3.11</span>
            </a>
        </nav>
        <div id="sidebar_footer" class="p-4 z-10 transition-all duration-300">
            <div id="user_info_card"
                class="bg-black/20 rounded-2xl p-3 flex items-center gap-3 border border-white/5 sidebar-user-info hover:bg-black/30 transition-all duration-300 cursor-pointer group">
                <div
                    class="w-10 h-10 min-w-[2.5rem] rounded-full bg-pink-500 flex items-center justify-center text-white text-sm font-bold shadow-lg">
                    <?php
                    $AccountName = explode(' ', $client_info->row()->AccountName);
                    echo strtoupper(substr($AccountName[0], 0, 1) . (isset($AccountName[1]) ? substr($AccountName[1], 0, 1) : ''));
                    ?>
                </div>
                <div class="flex-1 overflow-hidden sidebar-text">
                    <p class="text-[14px] font-medium text-white truncate leading-tight mb-0.5">
                        <?= $client_info->row()->AccountName ?></p>
                    <p class="text-[12px] text-slate-400 truncate leading-tight">
                        <?= $this->session->userdata('fc_session_client_email') ?></p>
                </div>
                <div class="dropdown sidebar-text">
                    <button
                        class="text-slate-400 group-hover:text-white transition-colors flex items-center justify-center"
                        type="button" data-bs-toggle="modal" data-bs-target="#logout"  data-toggle="tooltip" title="" data-bs-original-title="Logout">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                    </button>
                </div>
            </div>
        </div>
    </aside>

    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative bg-slate-50 dark:bg-slate-950">
        <header class="h-20 glass z-30 sticky top-0 px-6 sm:px-8 flex items-center justify-between transition-all">
            <div class="flex items-center gap-4 md:hidden">
                <button id="navbar_toggle_btn"
                    class="p-2 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <img src="<?= base_url() ?>/img/wlogo.png" alt="logo" class="h-6 max-w-[120px] object-contain" />
            </div>

            <div class="hidden md:flex items-center gap-4">
                <button id="sidebar_toggle_btn"
                    class="p-2 text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white transition-colors rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 line-height-0">
                    <span class="material-symbols-outlined text-[24px]">menu</span>
                </button>
            </div>
            <div class="flex items-center gap-3 sm:gap-6">
                
                <div class="flex items-center gap-3">
                    <div class="dropdown">
                        <button
                            class="p-2 text-slate-500 hover:text-primary transition-colors dark:text-slate-400 dark:hover:text-primary"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="material-symbols-outlined text-[22px]">settings</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= base_url() ?>users/view_profile"><i
                                    class="fa fa-user"></i> <span>Profile</span></a>
                            <a class="dropdown-item" href="<?= base_url() ?>users/password_change"><i
                                    class="fa fa-cog"></i> <span>Change Password</span></a>
                        </div>
                    </div>
                    <button id="theme-toggle"
                        class="p-2 text-slate-500 hover:text-primary transition-colors dark:text-slate-400 dark:hover:text-primary">
                        <span class="material-symbols-outlined text-[22px] dark:hidden">dark_mode</span>
                        <span class="material-symbols-outlined text-[22px] hidden dark:inline-block">light_mode</span>
                    </button>
                </div>
            </div>
        </header>
        <main class="flex-1 overflow-y-auto p-6 sm:p-8 custom-scrollbar scroll-smooth pb-0">
            <div class="max-w-[1600px] mx-auto space-y-8 animate-fade-in"></div>

            <script>
                // Sidebar toggle functionality
                document.addEventListener('DOMContentLoaded', function () {
                    const sidebar = document.getElementById('sidebar');
                    const sidebarToggleBtn = document.getElementById('sidebar_toggle_btn');
                    const sidebarHeader = document.getElementById('sidebar_header');
                    const sidebarFooter = document.getElementById('sidebar_footer');
                    const userInfoCard = document.getElementById('user_info_card');

                    let isSidebarCollapsed = false;

                    if (sidebarToggleBtn && sidebar) {
                        sidebarToggleBtn.addEventListener('click', function () {
                            isSidebarCollapsed = !isSidebarCollapsed;
                            const logoShort = sidebar.querySelector('.sidebar-logo-short');

                            if (isSidebarCollapsed) {
                                // Collapse sidebar
                                sidebar.classList.remove('w-[250px]');
                                sidebar.style.width = '90px';

                                // Header adjustments
                                if (sidebarHeader) {
                                    sidebarHeader.classList.remove('px-8');
                                    sidebarHeader.classList.add('px-0', 'justify-center');
                                }

                                // Footer adjustments
                                if (sidebarFooter) {
                                    sidebarFooter.classList.remove('p-4');
                                    sidebarFooter.classList.add('p-2');
                                }
                                if (userInfoCard) {
                                    userInfoCard.classList.remove('p-4', 'gap-3');
                                    userInfoCard.classList.add('p-2', 'justify-center', 'gap-0');
                                }

                                // Show short logo
                                if (logoShort) {
                                    logoShort.classList.remove('opacity-0', 'invisible');
                                }

                                // Hide text elements
                                const sidebarTexts = sidebar.querySelectorAll('.sidebar-text');
                                sidebarTexts.forEach(text => {
                                    text.style.opacity = '0';
                                    text.style.visibility = 'hidden';
                                    text.style.position = 'absolute';
                                });

                                // Center icons
                                const navLinks = sidebar.querySelectorAll('nav a');
                                navLinks.forEach(link => {
                                    link.classList.add('justify-center');
                                    link.classList.remove('gap-3');
                                });

                            } else {
                                // Expand sidebar
                                sidebar.style.width = '';
                                sidebar.classList.add('w-[250px]');

                                // Header restore
                                if (sidebarHeader) {
                                    sidebarHeader.classList.add('px-8');
                                    sidebarHeader.classList.remove('px-0', 'justify-center');
                                }

                                // Footer restore
                                if (sidebarFooter) {
                                    sidebarFooter.classList.add('p-4');
                                    sidebarFooter.classList.remove('p-2');
                                }
                                if (userInfoCard) {
                                    userInfoCard.classList.add('p-4', 'gap-3');
                                    userInfoCard.classList.remove('p-2', 'justify-center', 'gap-0');
                                }

                                // Hide short logo
                                if (logoShort) {
                                    logoShort.classList.add('opacity-0', 'invisible');
                                }

                                // Show text elements
                                const sidebarTexts = sidebar.querySelectorAll('.sidebar-text');
                                sidebarTexts.forEach(text => {
                                    text.style.opacity = '1';
                                    text.style.visibility = 'visible';
                                    text.style.position = '';
                                });

                                // Reset link styles
                                const navLinks = sidebar.querySelectorAll('nav a');
                                navLinks.forEach(link => {
                                    link.classList.remove('justify-center');
                                    link.classList.add('gap-3');
                                });
                            }
                        });
                    }
                });

                // Theme toggle functionality
                const themeToggle = document.getElementById('theme-toggle');
                if (themeToggle) {
                    themeToggle.addEventListener('click', function () {
                        const html = document.documentElement;
                        const isDark = html.classList.contains('dark');

                        if (isDark) {
                            html.classList.remove('dark');
                            localStorage.setItem('theme', 'light');
                        } else {
                            html.classList.add('dark');
                            localStorage.setItem('theme', 'dark');
                        }
                    });
                }

                // Fix sidebar footer dropdown positioning
                const sidebarDropdown = document.querySelector('#sidebar_footer .dropdown-menu');
                if (sidebarDropdown) {
                    // Remove animation attributes that cause repositioning
                    sidebarDropdown.removeAttribute('data-dropdown-in');
                    sidebarDropdown.removeAttribute('data-dropdown-out');

                    // Force fixed positioning
                    const fixDropdownPosition = function () {
                        sidebarDropdown.style.position = 'absolute';
                        sidebarDropdown.style.top = 'auto';
                        sidebarDropdown.style.bottom = '100%';
                        sidebarDropdown.style.right = '0';
                        sidebarDropdown.style.left = 'auto';
                        sidebarDropdown.style.transform = 'none';
                        sidebarDropdown.style.marginBottom = '0.5rem';
                    };

                    // Apply on show
                    const dropdownButton = document.querySelector('#sidebar_footer .dropdown button');
                    if (dropdownButton) {
                        dropdownButton.addEventListener('click', function () {
                            setTimeout(fixDropdownPosition, 0);
                        });
                    }

                    // Watch for class changes
                    const observer = new MutationObserver(function (mutations) {
                        mutations.forEach(function (mutation) {
                            if (mutation.attributeName === 'class' && sidebarDropdown.classList.contains('show')) {
                                fixDropdownPosition();
                            }
                        });
                    });

                    observer.observe(sidebarDropdown, { attributes: true });
                }
            </script>
