<?php
                                    $a = \DB::select("SELECT * FROM infrastruktur_aplikasipodtoba where Status='Requested'");
                                ?>
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>{{count($karyailmiah)}}</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have new notifications <a href="/Publikasi">view all</a></span>
                                    <div class="nofity-list">
                                    @foreach($karyailmiah as $ki)
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <a href="/Publikasi">
                                                <p>{{ $ki->Judul }}</p>
                                                <span>{{ $ki->created_at }}</span>
                                                </a>
                                            </div>
                                    @endforeach
                                    </div>
                                </div>