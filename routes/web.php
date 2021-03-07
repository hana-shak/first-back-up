  <?php



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

use App\Customer;
use App\Http\Controllers\DiscussionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('web.landing');
});

// Route::get('/home', 'HomeController@index')->name('home');   //Maybe I will use it next days

//Login admin dashboard access  views are not ready for this, not working yest
Route::prefix('/dashboard')->group(function(){
    Route::get('/login'   ,'Auth\AdminLoginController@showLoginForm');
    Route::get('/submit','Auth\AdminLoginController@showLoginForm');
    Route::post('/submit'  ,'Auth\AdminLoginController@login');

});

//manage_admins dashboard pages
Route::prefix('/super')->group(function(){
    Route::get('/admin','AdminController@index');  // (blank/empty) page
    Route::get('/addadmin','AdminController@addnewadmin');
    Route::get('/newadmin','AdminController@create');
    Route::post('/newadmin','AdminController@create');
    Route::get('/alladmins','AdminController@show');
    Route::get('/singleadmin/{id}','AdminController@showsingleadmin');
    Route::get('/editadmin/{id}','AdminController@edit');
    Route::post('/update/{id}','AdminController@update');
    Route::get('/deleteadmin/{id}','AdminController@destroy');
});


//DiscussionCategory dashboard pages
Route::get('/newdiscussion','DiscussionCategoryController@newdiscussioncategory');
Route::post('/catdis','DiscussionCategoryController@create');
Route::get('/catdis','DiscussionCategoryController@newdiscussioncategory');
Route::get('/totalcategory','DiscussionCategoryController@show');
Route::get('/singlediscussion/{id}','DiscussionCategoryController@singlecat');
Route::get('/editscatdis/{id}','DiscussionCategoryController@edit');
Route::post('/catdiscupdate/{id}','DiscussionCategoryController@update');
Route::get('/catdiscupdate','DiscussionCategoryController@show');
Route::get('/catdisdelete/{id}','DiscussionCategoryController@destroy');


//Subdiscussioncategory dashboard pages
Route::get('/subs/{id}','SubDiscussionCategoryController@index');  //to list all subs after clicking on button in allcategory page
Route::get('/new','SubDiscussionCategoryController@newsub');
Route::post('/subcatdis','SubDiscussionCategoryController@create');
Route::get('/subdiscussion/{id}','SubDiscussionCategoryController@subs');
Route::get('/singlesub/{id}','SubDiscussionCategoryController@show');
Route::get('/edit/{id}/subscatdis','SubDiscussionCategoryController@edit');
Route::post('/updatesubcat/{id}','SubDiscussionCategoryController@update');
Route::get('/updatesubcat/{id}','SubDiscussionCategoryController@show');
Route::get('/delete/{id}','SubDiscussionCategoryController@destroy');


///////////////////////// LOGIN + REGISTRATION /////////////////////////////////
Auth::routes();

//////////////////////// COMMUNITY PAGES ///////////////////////////////////////
Route::get('/community',function(){
    return view('web.com.first');
});

//Discussion Form - Ajax Idea
Route::get('/start','DiscussionController@index');
Route::get('/getSubs/{id}', 'DiscussionController@subCat');

Route::post('/submit','DiscussionController@create');
Route::get('/submit','DiscussionController@index');

//Showing & viewing discussion with different options
Route::get('singlediscussion','DiscussionController@showlatestDiscussion')->name('singlediscussion');
Route::get('/single/{id}','DiscussionController@showsingleDiscussion');
Route::get('/alldisc','DiscussionController@showAllDiscussions');


// update & delete single discussion
Route::post('/update/{id}','DiscussionController@update');
Route::get('/update/{id}','DiscussionController@edit');
Route::get('/delete/{id}','DiscussionController@destroy');

//Reply Routes
Route::post('/reply','ReplyController@create');
Route::get('/latestreply','ReplyController@latestReply');

//Comment Routes
// Route::post('/reply','CommentController@create');
// Route::get('/latest','CommentController@latest');


