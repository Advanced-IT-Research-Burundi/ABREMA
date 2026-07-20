@extends('layouts.base')

@section('title', $actualite->title . ' - ABREMA')

@section('content')

    <!-- Page Header -->
    <section class="page-header"
        style="background: linear-gradient(135deg, var(--abrema-green) 0%, var(--abrema-dark-green) 100%); padding: 60px 0; text-align: center; color: white;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <h1 style="font-size: 42px; margin-bottom: 15px; font-weight: 700;">{{ $actualite->title }}</h1>
            <div
                style="display: flex; align-items: center; justify-content: center; gap: 25px; font-size: 15px; margin-top: 20px; flex-wrap: wrap;">
                <span style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-calendar" style="color: var(--secondary-color);"></i>
                    {{ $actualite->created_at->format('d M Y') }}
                </span>
                <span style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-user" style="color: var(--secondary-color);"></i>
                    Par Admin ABREMA
                </span>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section style="padding: 60px 0; background: #f8f9fa;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="max-width: 900px; margin: 0 auto;">

                <!-- Breadcrumb -->
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 30px; color: var(--text-light); font-size: 14px;">
                    <a href="{{ route('home') }}" style="color: var(--abrema-green); text-decoration: none; transition: all 0.3s;">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <a href="{{ route('information.actualite') }}" style="color: var(--abrema-green); text-decoration: none; transition: all 0.3s;">
                        Actualités
                    </a>
                    <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                    <span>{{ Str::limit($actualite->title, 50) }}</span>
                </div>

                <!-- Article Card -->
                <div
                    style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 40px;">

                    <!-- Featured Image -->
                    @if ($actualite->image)
                        <div style="width: 100%; height: 500px; overflow: hidden; position: relative;">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 20px; right: 20px; background: var(--secondary-color); color: var(--text-dark); padding: 8px 20px; border-radius: 25px; font-weight: 700; font-size: 14px; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                                ANNONCE
                            </div>
                        </div>
                    @else
                        <div
                            style="width: 100%; height: 500px; background: linear-gradient(135deg, var(--abrema-green) 0%, var(--abrema-dark-green) 100%); display: flex; align-items: center; justify-content: center; position: relative;">
                            <i class="fas fa-bullhorn" style="font-size: 120px; color: rgba(255,255,255,0.2);"></i>
                            <div style="position: absolute; top: 20px; right: 20px; background: var(--secondary-color); color: var(--text-dark); padding: 8px 20px; border-radius: 25px; font-weight: 700; font-size: 14px;">
                                ANNONCE
                            </div>
                        </div>
                    @endif

                    <!-- Article Body -->
                    <div style="padding: 50px;">

                        <!-- Meta Info -->
                        <div
                            style="display: flex; align-items: center; gap: 30px; padding-bottom: 25px; margin-bottom: 35px; border-bottom: 2px solid #e0e0e0; flex-wrap: wrap;">
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-calendar-alt" style="color: var(--abrema-green); font-size: 18px;"></i>
                                <span style="font-size: 15px;">{{ $actualite->created_at->format('d F Y') }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-clock" style="color: var(--abrema-green); font-size: 18px;"></i>
                                <span style="font-size: 15px;">{{ $actualite->created_at->diffForHumans() }}</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 10px; color: var(--text-light);">
                                <i class="fas fa-user" style="color: var(--abrema-green); font-size: 18px;"></i>
                                <span style="font-size: 15px;">Admin ABREMA</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <div style="margin-bottom: 35px;">
                            <p style="font-size: 20px; line-height: 1.8; color: var(--text-dark); font-weight: 600;">
                                {{ $actualite->description }}
                            </p>
                        </div>

                        <!-- Content -->
                        <div style="font-size: 17px; line-height: 1.9; color: var(--text-dark); text-align: justify;">
                            {!! nl2br(e($actualite->contenu ?? $actualite->description)) !!}
                        </div>

                        <!-- Share Section -->
                        <div style="margin-top: 50px; padding-top: 35px; border-top: 2px solid #e0e0e0;">
                            <h4 style="margin-bottom: 25px; color: var(--abrema-green); font-size: 20px; font-weight: 700;">
                                <i class="fas fa-share-alt"></i> Partager cette actualité
                            </h4>
                            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank"
                                    style="width: 50px; height: 50px; background: #1877f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 20px; transition: all 0.3s; box-shadow: 0 3px 10px rgba(24, 119, 242, 0.3);"
                                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(24, 119, 242, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(24, 119, 242, 0.3)'">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $actualite->title }}"
                                    target="_blank"
                                    style="width: 50px; height: 50px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 20px; transition: all 0.3s; box-shadow: 0 3px 10px rgba(29, 161, 242, 0.3);"
                                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(29, 161, 242, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(29, 161, 242, 0.3)'">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $actualite->title }}"
                                    target="_blank"
                                    style="width: 50px; height: 50px; background: #0a66c2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 20px; transition: all 0.3s; box-shadow: 0 3px 10px rgba(10, 102, 194, 0.3);"
                                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(10, 102, 194, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(10, 102, 194, 0.3)'">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://wa.me/?text={{ $actualite->title }} {{ url()->current() }}" target="_blank"
                                    style="width: 50px; height: 50px; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 20px; transition: all 0.3s; box-shadow: 0 3px 10px rgba(37, 211, 102, 0.3);"
                                    onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 5px 15px rgba(37, 211, 102, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(37, 211, 102, 0.3)'">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Between Articles -->
                @if(isset($previousActualite) || isset($nextActualite))
                <div style="display: flex; justify-content: space-between; gap: 20px; margin-bottom: 50px; flex-wrap: wrap;">
                    @if(isset($previousActualite))
                        <a href="{{ route('actualite.show', $previousActualite->id) }}"
                            style="flex: 1; display: flex; align-items: center; gap: 15px; padding: 25px; background: white; border: 2px solid #e0e0e0; border-radius: 12px; text-decoration: none; transition: all 0.3s; min-width: 280px;"
                            onmouseover="this.style.borderColor='var(--abrema-green)'; this.style.background='var(--bg-light)'"
                            onmouseout="this.style.borderColor='#e0e0e0'; this.style.background='white'">
                            <div style="width: 45px; height: 45px; background: var(--abrema-green); color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 18px; flex-shrink: 0;">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-size: 13px; color: var(--text-light); margin-bottom: 5px;">Article précédent</div>
                                <div style="color: var(--text-dark); font-weight: 600; font-size: 15px;">{{ Str::limit($previousActualite->title, 50) }}</div>
                            </div>
                        </a>
                    @endif

                    @if(isset($nextActualite))
                        <a href="{{ route('actualite.show', $nextActualite->id) }}"
                            style="flex: 1; display: flex; align-items: center; gap: 15px; padding: 25px; background: white; border: 2px solid #e0e0e0; border-radius: 12px; text-decoration: none; transition: all 0.3s; min-width: 280px; text-align: right; flex-direction: row-reverse;"
                            onmouseover="this.style.borderColor='var(--abrema-green)'; this.style.background='var(--bg-light)'"
                            onmouseout="this.style.borderColor='#e0e0e0'; this.style.background='white'">
                            <div style="width: 45px; height: 45px; background: var(--abrema-green); color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 18px; flex-shrink: 0;">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-size: 13px; color: var(--text-light); margin-bottom: 5px;">Article suivant</div>
                                <div style="color: var(--text-dark); font-weight: 600; font-size: 15px;">{{ Str::limit($nextActualite->title, 50) }}</div>
                            </div>
                        </a>
                    @endif
                </div>
                @endif

                <!-- Back to List Button -->
                <div style="text-align: center; margin-bottom: 50px;">
                    <a href="{{ route('information.actualite') }}"
                        style="display: inline-flex; align-items: center; gap: 12px; padding: 15px 35px; background: var(--abrema-green); color: white; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 16px; box-shadow: 0 4px 15px rgba(45, 122, 62, 0.3); transition: all 0.3s;"
                        onmouseover="this.style.background='var(--abrema-dark-green)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 6px 20px rgba(45, 122, 62, 0.4)'"
                        onmouseout="this.style.background='var(--abrema-green)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(45, 122, 62, 0.3)'">
                        <i class="fas fa-arrow-left"></i> Retour aux actualités
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if (isset($autresActualites) && $autresActualites->count() > 0)
        <section style="padding: 80px 0; background: white;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                
                <!-- Section Header -->
                <div style="text-align: center; margin-bottom: 50px;">
                    <h2 style="font-size: 36px; color: var(--abrema-green); margin-bottom: 15px; font-weight: 700;">
                        Autres <span style="font-weight: 300; color: var(--text-dark);">Actualités</span>
                    </h2>
                    <div style="width: 80px; height: 4px; background: var(--secondary-color); margin: 0 auto 20px; border-radius: 2px;"></div>
                    <p style="font-size: 17px; color: var(--text-light); max-width: 600px; margin: 0 auto;">Découvrez nos autres publications récentes</p>
                </div>

                <!-- News Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-bottom: 50px;">
                    @foreach ($autresActualites as $autre)
                        <div style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: all 0.3s;"
                            onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                            
                            <!-- Image -->
                            <div style="position: relative; height: 250px; overflow: hidden;">
                                @if ($autre->image)
                                    <img src="{{ asset('storage/' . $autre->image) }}" alt="{{ $autre->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover; transition: all 0.3s;"
                                        onmouseover="this.style.transform='scale(1.1)'"
                                        onmouseout="this.style.transform='scale(1)'">
                                @else
                                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, var(--abrema-green), var(--abrema-light-green)); display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-bullhorn" style="font-size: 60px; color: rgba(255,255,255,0.3);"></i>
                                    </div>
                                @endif
                                
                                <!-- Date Badge -->
                                <div style="position: absolute; top: 15px; left: 15px; background: var(--secondary-color); color: var(--text-dark); padding: 8px 15px; border-radius: 8px; font-weight: 700; box-shadow: 0 3px 10px rgba(0,0,0,0.2);">
                                    <div style="font-size: 20px; line-height: 1;">{{ $autre->created_at->format('d') }}</div>
                                    <div style="font-size: 12px; text-transform: uppercase;">{{ $autre->created_at->format('M') }}</div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div style="padding: 30px;">
                                <!-- Meta -->
                                <div style="display: flex; gap: 20px; margin-bottom: 15px; font-size: 13px; color: var(--text-light);">
                                    <span style="display: flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-user" style="color: var(--abrema-green);"></i> Admin
                                    </span>
                                    <span style="display: flex; align-items: center; gap: 5px;">
                                        <i class="fas fa-calendar" style="color: var(--abrema-green);"></i> {{ $autre->created_at->format('d/m/Y') }}
                                    </span>
                                </div>

                                <!-- Title -->
                                <h3 style="font-size: 20px; color: var(--text-dark); margin-bottom: 15px; line-height: 1.4; font-weight: 700; min-height: 56px;">
                                    {{ Str::limit($autre->title, 60) }}
                                </h3>

                                <!-- Description -->
                                <p style="color: var(--text-light); font-size: 15px; line-height: 1.6; margin-bottom: 20px;">
                                    {{ Str::limit($autre->description, 100) }}
                                </p>

                                <!-- Read More Link -->
                                <a href="{{ route('actualite.show', $autre->id) }}"
                                    style="display: inline-flex; align-items: center; gap: 8px; color: var(--abrema-green); font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s;"
                                    onmouseover="this.style.color='var(--secondary-color)'; this.style.gap='12px'"
                                    onmouseout="this.style.color='var(--abrema-green)'; this.style.gap='8px'">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div style="text-align: center;">
                    <a href="{{ route('information.actualite') }}"
                        style="display: inline-flex; align-items: center; gap: 12px; padding: 15px 40px; background: var(--abrema-green); color: white; border-radius: 50px; text-decoration: none; font-weight: 600; font-size: 16px; box-shadow: 0 4px 15px rgba(45, 122, 62, 0.3); transition: all 0.3s;"
                        onmouseover="this.style.background='var(--abrema-dark-green)'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 6px 20px rgba(45, 122, 62, 0.4)'"
                        onmouseout="this.style.background='var(--abrema-green)'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(45, 122, 62, 0.3)'">
                        Voir toutes les actualités <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

@endsection