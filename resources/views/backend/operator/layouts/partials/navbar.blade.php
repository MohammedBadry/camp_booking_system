    <div class="nav-toggler">
    
        <svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path></svg>
    
    </div>
    <div class="nav-tools">
    
        <div class="notifications-dropdown dropdown">
        
            <a class="notifications-dropdown-btn d-block" href="#">
            
                <svg id="Layer_2" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m13.5 4.18c-.276 0-.5-.224-.5-.5v-1.68c0-.551-.449-1-1-1s-1 .449-1 1v1.68c0 .276-.224.5-.5.5s-.5-.223-.5-.5v-1.68c0-1.103.897-2 2-2s2 .897 2 2v1.68c0 .277-.224.5-.5.5z"/></g><g><path d="m12 24c-1.93 0-3.5-1.57-3.5-3.5 0-.276.224-.5.5-.5s.5.224.5.5c0 1.378 1.122 2.5 2.5 2.5s2.5-1.122 2.5-2.5c0-.276.224-.5.5-.5s.5.224.5.5c0 1.93-1.57 3.5-3.5 3.5z"/></g><g><path d="m20.5 21h-17c-.827 0-1.5-.673-1.5-1.5 0-.439.191-.854.525-1.14 1.576-1.332 2.475-3.27 2.475-5.322v-3.038c0-3.86 3.14-7 7-7 3.86 0 7 3.14 7 7v3.038c0 2.053.899 3.99 2.467 5.315.342.293.533.708.533 1.147 0 .827-.672 1.5-1.5 1.5zm-8.5-17c-3.309 0-6 2.691-6 6v3.038c0 2.348-1.028 4.563-2.821 6.079-.115.098-.179.237-.179.383 0 .276.224.5.5.5h17c.276 0 .5-.224.5-.5 0-.146-.064-.285-.175-.38-1.796-1.519-2.825-3.735-2.825-6.082v-3.038c0-3.309-2.691-6-6-6z"/></g></svg>

            
            </a>
            <span class="new-notification" id="income-notification"></span>
            
        </div>
        <div class="user-account dropdown">
        
                    <a class="account-dropdown-btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    
                        <div class="user-img">
                        
                            <img class="img-fluid" src="@if(auth()->user()->image!='') {{url('uploads/profiles/'.auth()->user()->image)}} @else {{asset('backend')}}/img/avatar.png @endif">
                        
                        </div>
                        <div class="user-details">
                        
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-access">{{ Auth::user()->role }}</div>
                        </div>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        
                        <li><a class="dropdown-item" href="{{route('operator.profile.index')}}">الصفحة الشخصية</a></li>
                        <li>
                            <a class="dropdown-item" href="javascript:$('#logout_form').submit();">تسجيل الخروج</a>
                        </li>                 
                    </ul>
            
        </div>

    </div>
    
