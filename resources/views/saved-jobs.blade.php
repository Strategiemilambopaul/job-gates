@include('partials.header')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Saved Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
               @include('Home.usersSettings')
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        @if($jobs->count()  < 1)
                        <h3 class="fs-4 mb-1">You don't have any jobs saved on your blogs 🚫</h3>
                        @else
                        <h3 class="fs-4 mb-1">Saved Jobs</h3>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                @foreach($jobs as $job )
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">{{$job->title}}</div>
                                            <div class="info1">{{$job->nature}} . {{$job->location}}</div>
                                        </td>
                                        <td>{{$job->created_at->format('Y, M d | H:i')}}</td>
                                        <td>130 Applications</td>
                                        <td>
                                            <div class="job-status text-capitalize">active</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{route('job-detail',['id'=>$job->id])}}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                    <form action="{{route('job_saves-delete')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="delete" value="{{$job->id}}">
                                                        <li><button type="submit" class="dropdown-item" onClick="alert('do you want to delete this job on your blog of jobs saved? ⛔')"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button></li>
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                           @endif
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@include('partials.Profilchanging')
@include('partials.footer')