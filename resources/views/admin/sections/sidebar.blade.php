<div class="sb2-1">
    <!--== USER INFO ==-->
    <div class="sb2-12">
        <ul>
            <li><img src="{{ asset('admin/images/placeholder.jpg') }}" alt="">
            </li>
            <li>
                <h5>Admin <span>Administrator</span></h5>
            </li>
            <li></li>
        </ul>
    </div>
    <!--== LEFT MENU ==-->
    <div class="sb2-13">
        <ul class="collapsible" data-collapsible="accordion">
            <!-- Dashboard -->
            <li><a href="{{ route('admin.dashboard') }}" class="menu-active"><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</a>
            </li>
            
            <!-- Manage Website Section -->
            <li class="menu-section-heading">
                <h6 class="menu-heading"><i class="fa fa-globe" aria-hidden="true"></i> Manage Website</h6>
            </li>
            
            <!-- Home Page -->
            <li><a href="#" class="collapsible-header"><i class="fa fa-home" aria-hidden="true"></i> Home Page</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{ route('admin.header.edit') }}">Header Settings</a></li>
                        <li><a href="{{ route('admin.homebanner.index') }}">Hero Section</a></li>
                        <li><a href="{{ route('admin.homeabout.index') }}">Home About Section</a></li>
                        <li><a href="{{ route('admin.mainabout.index') }}">About Page</a></li>
                        <li><a href="{{ route('admin.homeservice.index') }}">Services Section</a></li>
                        <li><a href="{{ route('admin.grooming-package.index') }}">Grooming Packages</a></li>
                        <li><a href="{{ route('admin.testimonial.index') }}">Testimonials Section</a></li>
                        
                    </ul>
                </div>
            </li>
            
            <!-- Gallery Page -->
            <li><a href="#" class="collapsible-header"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery Page</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{ route('admin.gallery.index') }}">All Images</a></li>
                        <li><a href="{{ route('admin.video.gallery') }}">All Videos</a></li>
                    </ul>
                </div>
            </li>
            
            <!-- Blog Page -->
            <li><a href="#" class="collapsible-header"><i class="fa fa-rss" aria-hidden="true"></i> Blog Page</a>
                <div class="collapsible-body left-sub-menu">
                    <ul>
                        <li><a href="{{ route('admin.blog.index') }}">All Blog Posts</a></li>
                        {{-- <li><a href="{{ route('admin.blog.create') }}">Add New Blog</a></li> --}}
                    </ul>
                </div>
            </li>
            
            <!-- Appointments -->
            <li><a href="{{ route('admin.appointment.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> Appointments</a></li>
            
            <!-- Contacts -->
            <li><a href="{{ route('admin.contact.index') }}"><i class="fa fa-envelope" aria-hidden="true"></i> Contacts</a></li>

             <!-- Footer Addresses -->
             <li><a href="{{ route('admin.footer.address.index') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> Footer Addresses</a></li>
        </ul>
    </div>
    
    <style>
        .menu-section-heading {
            margin-top: 15px;
            margin-bottom: 5px;
            padding: 10px 15px;
            background-color: #f5f5f5;
            border-left: 3px solid #2196F3;
        }
        
        .menu-section-heading .menu-heading {
            margin: 0;
            padding: 0;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            color: #666;
            letter-spacing: 1px;
        }
        
        .menu-section-heading .menu-heading i {
            margin-right: 8px;
            color: #2196F3;
        }
    </style>
</div>