<div class="container">
    <div class="col-sm-4 mx-auto mb-3 mt-3">
        <div class="form-control" style="background-color: lightskyblue">
            <select class="form-control" id="city" name="city" onchange="getSelectValue();">
                @if($city == '')
                    <option value="">აირჩიეთ ქალაქი.</option>@endif
                <option value="">{{$city}}</option>
                <option value="თბილისი">თბილისი.</option>
                <option value="ბათუმი">ბათუმი.</option>
                <option value="ქუთაისი">ქუთაისი.</option>
                <option value="რუსთავი">რუსთავი.</option>
                <option value="გორი">გორი.</option>
                <option value="ზუგდიდი">ზუგდიდი.</option>
                <option value="ფოთი">ფოთი.</option>
                <option value="ხაშური">ხაშური.</option>
                <option value="სამტრედია">სამტრედია.</option>
                <option value="სენაკი">სენაკი.</option>
                <option value="ზესტაფონი">ზესტაფონი.</option>
                <option value="მარნეული">მარნეული.</option>
                <option value="თელავი">თელავი.</option>
                <option value="ახალციხე">ახალციხე.</option>
                <option value="ქობულეთი">ქობულეთი.</option>
                <option value="ოზურგეთი">ოზურგეთი.</option>
                <option value="კასპი">კასპი.</option>
                <option value="ჭიათურა">ჭიათურა.</option>
                <option value="წყალტუბო">წყალტუბო.</option>
                <option value="საგარეჯო">საგარეჯო.</option>
                <option value="გარდაბანი">გარდაბანი.</option>
                <option value="ბორჯომი">ბორჯომი.</option>
                <option value="ტყიბული">ტყიბული.</option>
                <option value="ხონი">ხონი.</option>
                <option value="ბოლნისი">ბოლნისი.</option>
                <option value="ახალქალაქი">ახალქალაქი.</option>
                <option value="გურჯაანი">გურჯაანი.</option>
                <option value="მცხეთა">მცხეთა.</option>
                <option value="ყვარელი">ყვარელი.</option>
                <option value="ახმეტა">ახმეტა.</option>
                <option value="ქარელი">ქარელი.</option>
                <option value="ლანჩხუთი">ლანჩხუთი.</option>
                <option value="დუშეთი">დუშეთი.</option>
                <option value="საჩხერე">საჩხერე.</option>
                <option value="დედოფლისწყარო">დედოფლისწყარო.</option>
                <option value="ლაგოდეხი">ლაგოდეხი.</option>
                <option value="ნინოწმინდა">ნინოწმინდა.</option>
                <option value="აბაშა">აბაშა.</option>
                <option value="წნორი">წნორი.</option>
                <option value="თერჯოლა">თერჯოლა.</option>
                <option value="მარტვილი">მარტვილი.</option>
                <option value="ხობი">ხობი.</option>
                <option value="წალენჯიხა">წალენჯიხა.</option>
                <option value="ვანი">ვანი.</option>
                <option value="ბაღდათი">ბაღდათი.</option>
                <option value="ვალე">ვალე.</option>
                <option value="ჩხოროწყუ">ჩხოროწყუ.</option>
                <option value="თეთრიწყარო">თეთრიწყარო.</option>
                <option value="დმანისი">დმანისი.</option>
                <option value="ონი">ონი.</option>
                <option value="წალკა">წალკა.</option>
                <option value="ამბროლაური">ამბროლაური.</option>
                <option value="სიღნაღი">სიღნაღი.</option>
                <option value="ცაგერი">ცაგერი.</option>
                <option value="ჯვარი">ჯვარი.</option>
            </select>
        </div>
    </div><!-- /.col-sm-4 -->


    {{--                 ========== მენიუ - სლაიდერი ==========--}}
    <div class="SliderMenuDiv">
        <input type="radio" name="dot" id="one">
        <input type="radio" name="dot" id="two">
        <div class="main-card">
            <div class="cards">
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/cuttinghair.jpg')}}" alt="თმის შეჭრა, შეღებვა, ვარცხნილობა">
                            </div>
                            <div class="details">
                                <div class="name">თმის შეჭრა, შეღებვა, ვარცხნილობა</div>
                            </div>
                            <input type="text" id="location1" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch"
                                   value="თმის შეჭრა, შეღებვა, ვარცხნილობა" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/shave.jpeg')}}" alt="წვერის გაპარსვა">
                            </div>
                            <div class="details">
                                <div class="name">წვერის გაპარსვა</div>
                            </div>
                            <input type="text" id="location2" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="წვერის გაპარსვა"
                                   hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/makeup.jpg')}}" alt="მაკიაჟი">
                            </div>
                            <div class="details">
                                <div class="name">მაკიაჟი</div>
                            </div>
                            <input type="text" id="location3" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="მაკიაჟი" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/manicure.jpg')}}" alt="მანიკური">
                            </div>
                            <div class="details">
                                <div class="name">მანიკური</div>
                            </div>
                            <input type="text" id="location4" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="მანიკური" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/pedicure.jpg')}}" alt="პედიკური">
                            </div>
                            <div class="details">
                                <div class="name">პედიკური</div>
                            </div>
                            <input type="text" id="location5" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="პედიკური" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/lashes_brows.jpg')}}" alt="წარბები და წამწამები">
                            </div>
                            <div class="details">
                                <div class="name">წარბები და წამწამები</div>
                            </div>
                            <input type="text" id="location6" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch"
                                   value="წარბები და წამწამები"
                                   hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
            </div><!-- /.cards -->

            <div class="cards">
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/tattooing.jpg')}}" alt="ტატუირება">
                            </div>
                            <div class="details">
                                <div class="name">ტატუირება</div>
                            </div>
                            <input type="text" id="location7" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="ტატუირება" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/spa.jpg')}}" alt="სპა">
                            </div>
                            <div class="details">
                                <div class="name">სპა</div>
                            </div>
                            <input type="text" id="location8" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="სპა" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/epilation.jpg')}}" alt="ეპილაცია">
                            </div>
                            <div class="details">
                                <div class="name">ეპილაცია</div>
                            </div>
                            <input type="text" id="location9" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="ეპილაცია" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/skincare.jpg')}}" alt="კანის მოვლა">
                            </div>
                            <div class="details">
                                <div class="name">კანის მოვლა</div>
                            </div>
                            <input type="text" id="location10" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="კანის მოვლა" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/festivehairstyle.jpg')}}" alt="სადღესასწაულო მაკიაჟი, ვარცხნილობა">
                            </div>
                            <div class="details">
                                <div class="name">სადღესასწაულო მაკიაჟი, ვარცხნილობა</div>
                            </div>
                            <input type="text" id="location11" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch"
                                   value="სადღესასწაულო მაკიაჟი, ვარცხნილობა" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="get" action="{{route('menusearch')}}">
                        <div class="content">
                            <div class="img">
                                <img src="{{asset('img/servicemenu/solarium.jpg')}}" alt="სოლარიუმი">
                            </div>
                            <div class="details">
                                <div class="name">სოლარიუმი</div>
                            </div>
                            <input type="text" id="location12" name="location" value="{{$city}}" hidden>
                            <input type="text" id="MenuSearch" name="MenuSearch" value="სოლარიუმი" hidden>
                            <button class="servicemenusearchBtn" type="submit">>>></button>
                        </div>
                    </form>
                </div>
            </div><!-- /.cards -->
        </div><!-- /.main-card -->
        <div class="button">
            <label for="one" class=" active one"></label>
            <label for="two" class="two"></label>
        </div>
    </div><!-- /.SliderMenuDiv -->
</div><!-- /.container -->
