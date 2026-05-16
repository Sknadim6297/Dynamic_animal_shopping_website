<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use App\Models\HomeAbout;
use App\Models\HomeService;
use App\Models\Groomer;
use App\Models\GroomingPackage;
use App\Models\Healthcare;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $banners = HomeBanner::whereNotNull('banner_image')->latest()->get();
        } catch (\Exception $e) {
            $banners = collect([]);
        }
        
        try {
            $homeAbout = HomeAbout::latest()->first();
        } catch (\Exception $e) {
            $homeAbout = null;
        }
        
        try {
            $homeService = HomeService::latest()->first();
        } catch (\Exception $e) {
            $homeService = null;
        }
        
        try {
            $groomers = Groomer::whereNotNull('image')->latest()->get();
        } catch (\Exception $e) {
            $groomers = collect([]);
        }
        
        try {
            $healthcare = Healthcare::latest()->first();
        } catch (\Exception $e) {
            $healthcare = null;
        }
        
        try {
            $counter = Counter::latest()->first();
        } catch (\Exception $e) {
            $counter = null;
        }
        
        try {
            $galleries = Gallery::whereNotNull('images')->latest()->get();
        } catch (\Exception $e) {
            $galleries = collect([]);
        }
        
        try {
            $testimonials = Testimonial::whereNotNull('image')->latest()->get();
        } catch (\Exception $e) {
            $testimonials = collect([]);
        }
        
        try {
            $blogs = Blog::whereNotNull('image')->latest()->take(6)->get();
        } catch (\Exception $e) {
            $blogs = collect([]);
        }
        
        return view('frontend.index', compact('banners', 'homeAbout', 'homeService', 'groomers', 'healthcare', 'counter', 'galleries', 'testimonials', 'blogs'));
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        try {
            $groomers = Groomer::whereNotNull('image')->latest()->get();
        } catch (\Exception $e) {
            $groomers = collect([]);
        }
        try {
            $mainAbout = \App\Models\MainAbout::latest()->first();
        } catch (\Exception $e) {
            $mainAbout = null;
        }

        try {
            $counter = Counter::latest()->first();
        } catch (\Exception $e) {
            $counter = null;
        }
        
        try {
            $testimonials = Testimonial::whereNotNull('image')->latest()->get();
        } catch (\Exception $e) {
            $testimonials = collect([]);
        }
        
        return view('frontend.sections.about', compact('groomers', 'counter', 'testimonials', 'mainAbout'));
    }

    /**
     * Display the services page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function services()
    {
        $homeService = HomeService::latest()->first();
        $counter = Counter::latest()->first();
        $blogs = Blog::whereNotNull('image')->latest()->take(6)->get();
        return view('frontend.sections.services', compact('homeService', 'counter', 'blogs'));
    }

    /**
     * Display the service details page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function serviceDetails()
    {
        return view('frontend.sections.service-details');
    }

    /**
     * Display the pet clinic page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petClinic()
    {
        return view('frontend.sections.petclinic');
    }

    /**
     * Display the pet food page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petFood()
    {
        return view('frontend.sections.petfood');
    }

    /**
     * Display the pet treats page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petTreats()
    {
        return view('frontend.sections.pettreats');
    }

    /**
     * Display the pet supplements page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petSupplements()
    {
        return view('frontend.sections.petsupplements');
    }

    /**
     * Display the pet accessories page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function petAccessories()
    {
        return view('frontend.sections.petaccessories');
    }

    /**
     * Display the aquariums and accessories page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aquariumsAccessories()
    {
        return view('frontend.sections.aquariums-accessories');
    }

    /**
     * Display the blog page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blog(Request $request)
    {
        $query = Blog::whereNotNull('image');
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('blog_heading', 'like', '%' . $request->search . '%')
                  ->orWhere('blog_details', 'like', '%' . $request->search . '%');
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('blog_category', $request->category);
        }
        
        // Get paginated blogs with query string preservation
        $blogs = $query->latest('posting_date')->paginate(6)->withQueryString();
        
        // Get all categories with counts
        $categoryCounts = Blog::whereNotNull('image')
            ->groupBy('blog_category')
            ->selectRaw('blog_category, COUNT(*) as count')
            ->get();
        
        $categories = $categoryCounts->map(function($item) {
            return (object) [
                'blog_category' => $item->blog_category,
                'count' => $item->count
            ];
        });
        
        // Get popular posts (latest 3)
        $popularPosts = Blog::whereNotNull('image')
            ->latest('posting_date')
            ->take(3)
            ->get();
        
        return view('frontend.sections.blog', compact('blogs', 'categories', 'popularPosts'));
    }

    /**
     * Display the blog details page.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function blogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        
        // Get related blogs (same category, exclude current)
        $relatedBlogs = Blog::where('blog_category', $blog->blog_category)
            ->where('id', '!=', $blog->id)
            ->whereNotNull('image')
            ->latest('posting_date')
            ->take(3)
            ->get();
        
        return view('frontend.sections.blog-details', compact('blog', 'relatedBlogs'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('frontend.sections.contact');
    }

    /**
     * Display the gallery page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gallery()
    {
        $galleries = Gallery::whereNotNull('images')->latest()->get();
        $videos = VideoGallery::whereNotNull('video')->latest()->get();

        return view('frontend.sections.gallery', compact('galleries', 'videos'));
    }

    /**
     * Display the photo gallery page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function photoGallery()
    {
        $galleries = Gallery::whereNotNull('images')->latest()->get();

        return view('frontend.sections.photo-gallery', compact('galleries'));
    }

    public function videoGallery()
    {
        $videos = VideoGallery::latest()->get();
        return view('frontend.sections.video-gallery', compact('videos'));
    }

    
    /**
     * Display the grooming booking page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function grooming()
    {
        $packages = GroomingPackage::where('is_active', true)->get();
        return view('frontend.sections.grooming', compact('packages'));
    }

    /**
     * Display the clinic booking page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clinicBooking()
    {
        $packages = collect(); // Empty collection for clinic, no packages needed
        return view('frontend.sections.clinic-booking', compact('packages'));
    }

    /**
     * Display the groomer details page.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function groomerDetails($id)
    {
        $groomer = Groomer::findOrFail($id);
        return view('frontend.sections.groomer-details', compact('groomer'));
    }
}

