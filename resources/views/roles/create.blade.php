<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAddRole" aria-labelledby="offcanvasAddRole">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasAddRole">Offcanvas Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <p>اسم الصلاحية :</p>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li>
                                        <a href="#">الصلاحيات</a>
                                        <ul>
                                            @foreach($permission as $value)
                                            <li>
                                                <label style="font-size: 16px;">
                                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    {{ $value->name }}
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>

                          
                      
                      
                    </div>
                </div>
              
            </div>
           
        </div>
        {!! Form::close() !!}
    </div>

</div>
