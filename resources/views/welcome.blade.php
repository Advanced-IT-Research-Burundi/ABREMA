<main class="main-content">
                    <h2>Équipe de Direction de l'ABREMA</h2>

                        <div class="row mt-4">
                            @forelse($membres as $membre)
                                <div class="col-md-4 mb-4">
                                    <div class="team-card">

                                        <!-- PHOTO -->
                                        <div class="team-photo">
                                            <img src="{{ $membre->photo ? asset('storage/' . $membre->photo) : asset('images/default-user.png') }}"
                                                alt="{{ $membre->nom_prenom }}">
                                        </div>

                                        <!-- INFO -->
                                        <div class="team-info">
                                            <h4>{{ $membre->nom_prenom }}</h4>
                                            <p class="description">{{ $membre->description }}</p>

                                            <p class="email">
                                                <i class="fas fa-envelope"></i>
                                                {{ $membre->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">Aucun membre enregistré pour l’instant.</p>
                            @endforelse
                        </div>
                    </main>

                    <h3>Nos Valeurs</h3>
                    <ul>
                        <li>Excellence dans la régulation pharmaceutique</li>
                        <li>Transparence et intégrité</li>
                        <li>Protection de la santé publique</li>
                        <li>Innovation et amélioration continue</li>
                        <li>Collaboration avec les parties prenantes</li>
                    </ul>
                </main>
