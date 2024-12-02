<?php

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\cms\NewsController;
use App\Http\Controllers\cms\PageController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\cms\BoardController;
use App\Http\Controllers\cms\SanadController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\cms\PartnerController;
use App\Http\Controllers\cms\ServiceController;
use App\Http\Controllers\cms\AllianceController;
use App\Http\Controllers\cms\CampaignController;
use App\Http\Controllers\cms\CmsEventController;
use App\Http\Controllers\cms\MediaBagController;
use App\Http\Controllers\cms\ResourceController;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\cms\ResourcesController;
use App\Http\Controllers\Users\RepliesController;
use App\Http\Controllers\Users\RequestController;
use App\Http\Controllers\cms\SubServiceController;
use App\Http\Controllers\cms\TeamMemberController;
use App\Http\Controllers\Users\OrphanageController;
use App\Http\Controllers\Users\IndividualController;
use App\Http\Controllers\cms\AccreditationController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\cms\ImportantLinksController;
use App\Http\Controllers\Users\OrganisationController;
use App\Http\Controllers\cms\TechnicalReportsController;
use App\Http\Controllers\cms\KnowledgeCreationController;
use App\Http\Controllers\Consultants\ConsultantController;
use App\Http\Controllers\Users\UserConsultationController;
use App\Http\Controllers\cms\PeriodicalNewsletterController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Consultants\RepliesConsultantController;
use App\Http\Controllers\cms\StoriesController as CMSStoriesController;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified','documented', 'redirect.consultant'])->get('/dashboard', function () {
    return redirect()->route('users.consultation.new');
})->name('dashboard');

Route::prefix('newsletter')->name('newsletter.')->group(function () {
    Route::get('/subscribe',[App\Http\Controllers\NewsletterController::class,'subscribe'])->name('subscribe');
    Route::post('/store',[App\Http\Controllers\NewsletterController::class,'store'])->name('store');

    Route::post('/store-user',[App\Http\Controllers\NewsletterController::class,'store_user'])->name('store_user');
    Route::get('/create',[App\Http\Controllers\NewsletterController::class,'createCampaign'])->name('create');

});

// site map route
Route::get('sitemap.xml',function() {
    return response()->view('sitemap')->header('Content-Type', 'xml');
});

Route::group([
                'prefix' => LaravelLocalization::setLocale(),
                'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', ]
], function(){
    Route::prefix('users')->middleware(['auth:sanctum', 'verified','redirect.consultant','documented'])->name('users.')->group(function () {
        Route::get('/consultation/faq',[SearchController::class,'index'])->name('consultation.faq');
        Route::get('/consultation/search',[SearchController::class,'search'])->name('consultation.search');
        Route::get('/consultation/request/create',[RequestController::class,'create'])->name('consultation.create');
        Route::post('/consultation/request/store',[RequestController::class,'store'])->name('consultation.store');
        Route::get('/consultation/main',[RequestController::class,'index'])->name('consultation.index');
        Route::get('/consultation/new',[RequestController::class,'newConsultations'])->name('consultation.new');
        Route::get('/consultation/closed',[RequestController::class,'closedConsultations'])->name('consultation.closed');
        Route::get('/consultation/assigned',[RequestController::class,'assignedConsultations'])->name('consultation.assigned');
        Route::get('/consultation/rejected',[RequestController::class,'rejectedConsultations'])->name('consultation.rejected');
        Route::get('/consultation/main/status/{id}',[RequestController::class,'status']);
        Route::get('/consultation/chat/{id}',[RepliesController::class,'index'])->name('consultation.chat');
        Route::get('/consultation/reply/{id}',[RepliesController::class,'reply'])->name('consultation.reply');
        Route::post('/consultation/chat/store/{id}',[RepliesController::class,'store']);
    });

    Route::get('/', [HomeController::class,'index'])->name('landing');

    Route::get('/contact-us',[ContactUsController::class,'index'])->name('contact_us');
    Route::post('/contact-us',[ContactUsController::class,'send'])->name('contact_us.send');

    Route::prefix('pages')->name('web.')->group(function () {
        Route::get('/board',[BoardController::class,'index'])->name('board.index');
        Route::get('/board/{id}',[BoardController::class,'show'])->name('board.show');
        Route::get('/team-members',[TeamMemberController::class,'index'])->name('team_members.index');
        Route::get('/team-members/{id}',[TeamMemberController::class,'show'])->name('team_members.show');
        Route::get('/stories/{id}',[CMSStoriesController::class,'show'])->name('stories.show');
        Route::get('/stories',[CMSStoriesController::class,'index'])->name('stories.index');
        Route::get('/news',[NewsController::class,'index'])->name('news.index');
        Route::get('/news/{id}',[NewsController::class,'show'])->name('news.show');
        Route::get('/who-we-are',[PageController::class,'who_we_are'])->name('pages.who_we_are');
        Route::get('/careers',[PageController::class,'index'])->name('pages.vacancies');
        Route::get('/careers/{id}',[PageController::class,'show'])->name('pages.carrer');
        Route::post('/careers/apply',[PageController::class,'apply'])->name('pages.carrer.apply');
        Route::get('/awards',[PageController::class,'awards'])->name('pages.certificates');
        Route::get('/important-links',[ImportantLinksController::class,'index'])->name('pages.ImportantLinks.index');
        Route::get('/technical-reports',[TechnicalReportsController::class,'index'])->name('pages.technical_reports');
        Route::get('/periodical-newsletters',[PeriodicalNewsletterController::class,'index'])->name('pages.periodical_newsletters');
        Route::get('/media-bags',[MediaBagController::class,'index'])->name('pages.media_bags');
        Route::get('/events',[CmsEventController::class,'index'])->name('pages.events');
        Route::get('/events/{id}',[CmsEventController::class,'show'])->name('pages.events.show');
        Route::get('/alliances',[AllianceController::class,'index'])->name('pages.alliances');
        Route::get('/accreditation',[AccreditationController::class,'index'])->name('pages.Accreditation ');
        Route::get('/campaigns',[CampaignController::class,'index'])->name('pages.campaigns');
        Route::get('/sanad',[SanadController::class,'index'])->name('pages.sanad');
        Route::get('/partners',[PartnerController::class,'index'])->name('pages.partners');
        Route::get('/partners/{id}',[PartnerController::class,'show'])->name('pages.partners');
        Route::get('/services/{id}',[ServiceController::class,'show'])->name('pages.services');
        Route::get('/knowledge-creation/{id}',[KnowledgeCreationController::class,'index'])->name('pages.KnowledgeCreation');
        Route::post('/knowledge-creation/search',[KnowledgeCreationController::class,'search'])->name('pages.KnowledgeCreation.search');
        Route::get('/KnowledgeCreation/resources/{id}',[ResourceController::class,'index'])->name('pages.resource');
        Route::post('/KnowledgeCreation/resources/{id}/download',[ResourceController::class,'download'])->name('pages.resource.download');
        Route::get('/sub-services/{id}',[SubServiceController::class,'show'])->name('pages.sub_services');
        Route::get('/impact',[PageController::class,'impact'])->name('pages.impact');
        Route::namespace('Donations')->group(function() {
            // Donations
            Route::get('/donations', [DonationsController::class,'index'])->name('donations.index');
            Route::post('/create-session', [DonationsController::class,'createSession'])->name('donations.createSession');
            Route::get('/donations-success', [DonationsController::class,'success'])->name('donations.success');
            Route::get('/donations/other-donation-methods', [DonationsController::class,'otherDonationMethods'])->name('donations.otherDonationMethods');
            Route::any('/cib-call-back', [DonationsController::class,'callBack'])->name('cibCallBack');
        });
    });




    Route::get('/consultation/stepper',function() {
        return view('users.consultation_stepper');
    });

    Route::prefix('consultants')->middleware(['auth:sanctum', 'verified','is.consultant'])->name('consultants.')->group(function () {

        Route::get('/consultation/main',[ConsultantController::class,'index'])->name('consultation.index');
        Route::get('/consultation/new',[ConsultantController::class,'newConsultations'])->name('consultation.new');
        Route::get('/consultation/closed',[ConsultantController::class,'closedConsultations'])->name('consultation.closed');
        Route::get('/consultation/assigned',[ConsultantController::class,'assignedConsultations'])->name('consultation.assigned');
        Route::get('/consultation/rejected',[ConsultantController::class,'rejectedConsultations'])->name('consultation.rejected');
        Route::get('/consultation/main/status/{id}',[ConsultantController::class,'status']);
        Route::get('/consultation/reject/{id}',[ConsultantController::class,'reject']);
        Route::get('/consultation/close/{id}',[ConsultantController::class,'close']);
        Route::get('/consultation/chat/{id}',[RepliesConsultantController::class,'index'])->name('consultation.chat');
        Route::get('/consultation/reply/{id}',[RepliesConsultantController::class,'reply'])->name('consultation.reply');
        Route::post('/consultation/chat/store/{id}',[RepliesConsultantController::class,'store']);
    });

    Route::prefix('users')->middleware(['auth:sanctum', 'verified'])->name('users.')->group(function () {
        Route::get('/organisation/create',[App\Http\Controllers\Users\OrganisationController::class,'create'])->name('organisation.create');
        Route::post('/organisation/store',[App\Http\Controllers\Users\OrganisationController::class,'store'])->name('organisation.store');

        Route::get('/organisation/edit',[App\Http\Controllers\Users\OrganisationController::class,'edit'])->name('organisation.edit');
        Route::put('/organisation//update',[App\Http\Controllers\Users\OrganisationController::class,'update'])->name('organisation.update');

        Route::get('/individual/create',[App\Http\Controllers\Users\IndividualController::class,'create'])->name('individual.create');
        Route::post('/individual/store',[App\Http\Controllers\Users\IndividualController::class,'store'])->name('individual.store');
        Route::get('/individual/edit',[App\Http\Controllers\Users\IndividualController::class,'edit'])->name('individual.edit');
        Route::put('/individual/update',[App\Http\Controllers\Users\IndividualController::class,'update'])->name('individual.update');

        Route::get('/orphanage/create',[App\Http\Controllers\Users\OrphanageController::class,'create'])->name('orphanage.create');
        Route::post('/orphanage/store',[App\Http\Controllers\Users\OrphanageController::class,'store'])->name('orphanage.store');


        Route::get('/orphanage/edit',[App\Http\Controllers\Users\OrphanageController::class,'edit'])->name('orphanage.edit');
        Route::put('/orphanage/update',[App\Http\Controllers\Users\OrphanageController::class,'update'])->name('orphanage.update');

        Route::get('/categorize',function(){
            return view('auth.category');
        })->name('user_category');

        Route::post('/categorize',function(Request $request){
            $user = Auth::user();
            $user->update([
                'category' => $request->category,
            ]);

            return redirect()->route('dashboard');
        })->name('categorize');
        Route::get('/edit',function(){

            if(Auth::user()->category == 'orphanage'){
                return redirect()->route('uhsers.orphanage.edit');
            }else if(Auth::user()->category == 'individual'){
                return redirect()->route('users.individual.edit');
            }else if(Auth::user()->category == 'organization'){
                return redirect()->route('users.organisation.edit');
            }else{
                return redirect()->route('dashboard');
            }
        })->name('edit');


        Route::get('/consultation/en',function() {
            return view('users.consultation_en');
        });
        Route::get('/consultation/admin',function() {
            return view('users.consultation_admin');
        });
        Route::get('/consultation/admin/chat',function() {
            return view('users.consultation_admin_chat');
        });
        Route::get('/consultation/about',function() {
            return view('users.consultation_about');
        });




        // Route::get('/consultation/main',[RequestController::class,'index'])->name('consultation.index');
        // Route::get('/consultation/new',[RequestController::class,'newConsultations'])->name('consultation.new');
        // Route::get('/consultation/closed',[RequestController::class,'closedConsultations'])->name('consultation.closed');
        // Route::get('/consultation/assigned',[RequestController::class,'assignedConsultations'])->name('consultation.assigned');
        // Route::get('/consultation/rejected',[RequestController::class,'rejectedConsultations'])->name('consultation.rejected');
        // Route::get('/consultation/main/status/{id}',[RequestController::class,'status']);

        // Route::get('/consultation/chat/{id}',[RepliesController::class,'index'])->name('consultation.chat');
        // Route::get('/consultation/reply/{id}',[RepliesController::class,'reply'])->name('consultation.reply');
        // Route::post('/consultation/chat/store',[RepliesController::class,'store']);

        // Route::get('/consultation/stepper',function() {
        //     return view('users.consultation_stepper');
        // });

        // Route::get('/consultation/faq',function() {
        //     return view('users.consultation_faq');
        // });

        /*   Route::resource('consultation', UserConsultationController::class)
        ->only(['index','edit', 'store', 'update','destroy'])
        ->middleware(['auth', 'verified']); */

    });
});








/* Route::post('users/consultation/{reques}', function ($request) {
    ->name('consultation.store')
}); */



Route::get('admin/consultations/new',[ConsultationController::class,'new'])->name('admin.consultations.new');
Route::get('admin/consultations/rejected',[ConsultationController::class,'rejected'])->name('admin.consultations.rejected');
Route::get('admin/consultations/assigned',[ConsultationController::class,'assigned'])->name('admin.consultations.assigned');
Route::get('admin/consultations/closed',[ConsultationController::class,'closed'])->name('admin.consultations.closed');
Route::get('admin/consultations/reply/approve/{id}',[ConsultationController::class,'approveReply'])->name('admin.consultations.reply.approve');
Route::post('admin/consultations/reply/reject',[ConsultationController::class,'rejectReply'])->name('admin.consultations.reply.reject');


Route::get('admin/consultations/{consultation}/consultants',[ConsultationController::class,'consultants'])->name('admin.consultations.consultants');
Route::get('admin/consultations/{consultation}/consultants/assign/{consultant}',[ConsultationController::class,'assignConsultant'])->name('admin.consultations.consultants.assign');

Route::post('admin/consultations/reject',[ConsultationController::class,'reject'])->name('admin.consultations.reject');
Route::get('admin/consultations/{consultation}/close',[ConsultationController::class,'close'])->name('admin.consultations.close');
Route::get('admin/consultations/{consultation}/manage',[ConsultationController::class,'manage'])->name('admin.consultations.manage');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('logout', function(){
        Auth::logout();
        Session::forget('password_hash_web');
        return redirect()->route('voyager.login');
    })->name('voyager.logout');

    // Route::get('dashboard-websockets', function () {
    //     return view('dashboard-websockets');
    // })->name('dashboard-websockets');

});
