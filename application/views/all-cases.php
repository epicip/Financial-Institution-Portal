<?php include_once 'inc/header.php' ?>

<div class="app-main">
    <div id="app-wrapper" class="app-wrapper d-flex flex-column align-items-stretch min-vh-100">

        <?php include_once 'inc/left-sidebar.php' ?>

        <div class="app-content-wrapper pt-13 pb-13 px-5">
            <div class="container-fluid">

                <div class="card shadow-custom rounded-custom">
                    <div class="card-body p-6">
                        <div class="mb-5">
                            <h5 class="portal-section-title mb-1">Case list</h5>
                            <p class="text-muted mb-0">Deceased personal details supplied for asset and liability search.</p>
                        </div>
                        <table id="casesTable" class="table align-middle portal-table mb-0 w-100">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-medium">Title</th>
                                    <th class="fw-medium">Forename</th>
                                    <th class="fw-medium">Middle Names</th>
                                    <th class="fw-medium">Surname</th>
                                    <th class="fw-medium">Alias</th>
                                    <th class="fw-medium">Date of Birth</th>
                                    <th class="fw-medium">Last known address</th>
                                    <th class="fw-medium">Previous Address</th>
                                    <th class="fw-medium">National Insurance Number</th>
                                    <th class="fw-medium">Further Details</th>
                                    <th class="fw-medium text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>James</span></div>
                                    </td>
                                    <td>Edward</td>
                                    <td>Whitaker</td>
                                    <td>Jim Whitaker</td>
                                    <td>12 Mar 1948</td>
                                    <td>14 Church Lane, Leeds, LS2 8HD</td>
                                    <td>9 Albert Street, York, YO1 6JT</td>
                                    <td><span class="portal-ni">QQ 12 34 56 C</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mrs</td>
                                    <td>
                                        <div class="portal-name"><span>Margaret</span></div>
                                    </td>
                                    <td>Anne</td>
                                    <td>Collins</td>
                                    <td>-</td>
                                    <td>04 Jul 1939</td>
                                    <td>22 Westfield Road, Manchester, M20 6QB</td>
                                    <td>5 Park View, Stockport, SK1 4DN</td>
                                    <td><span class="portal-ni">AB 98 76 54 A</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ms</td>
                                    <td>
                                        <div class="portal-name"><span>Priya</span></div>
                                    </td>
                                    <td>Lakshmi</td>
                                    <td>Sharma</td>
                                    <td>-</td>
                                    <td>22 Nov 1961</td>
                                    <td>8 Victoria Gardens, Birmingham, B15 2TT</td>
                                    <td>31 High Street, Coventry, CV1 5RE</td>
                                    <td><span class="portal-ni">JX 45 67 89 D</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>Robert</span></div>
                                    </td>
                                    <td>-</td>
                                    <td>Hughes</td>
                                    <td>Bob Hughes</td>
                                    <td>18 Jan 1955</td>
                                    <td>3 Harbour View, Cardiff, CF10 1EP</td>
                                    <td>17 Station Road, Newport, NP20 1AA</td>
                                    <td><span class="portal-ni">NW 11 22 33 B</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mrs</td>
                                    <td>
                                        <div class="portal-name"><span>Eleanor</span></div>
                                    </td>
                                    <td>Grace</td>
                                    <td>Bennett</td>
                                    <td>Ellie Bennett</td>
                                    <td>09 Sep 1942</td>
                                    <td>41 Queen Square, Bristol, BS1 4LH</td>
                                    <td>12 Pulteney Street, Bath, BA2 4BZ</td>
                                    <td><span class="portal-ni">CE 33 44 55 A</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>Thomas</span></div>
                                    </td>
                                    <td>William</td>
                                    <td>Price</td>
                                    <td>-</td>
                                    <td>15 Apr 1950</td>
                                    <td>6 Rodney Street, Liverpool, L1 2TE</td>
                                    <td>21 Marine Drive, Wirral, CH48 5DE</td>
                                    <td><span class="portal-ni">YP 22 11 00 C</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ms</td>
                                    <td>
                                        <div class="portal-name"><span>Aisha</span></div>
                                    </td>
                                    <td>Noor</td>
                                    <td>Khan</td>
                                    <td>-</td>
                                    <td>28 Feb 1968</td>
                                    <td>19 New Walk, Leicester, LE1 6TE</td>
                                    <td>4 Friar Gate, Derby, DE1 1BU</td>
                                    <td><span class="portal-ni">AK 77 88 99 D</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>David</span></div>
                                    </td>
                                    <td>Alan</td>
                                    <td>Foster</td>
                                    <td>Dave Foster</td>
                                    <td>03 Jun 1945</td>
                                    <td>27 Fargate, Sheffield, S1 2HD</td>
                                    <td>8 Moorgate, Rotherham, S60 2EN</td>
                                    <td><span class="portal-ni">DF 12 21 34 B</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mrs</td>
                                    <td>
                                        <div class="portal-name"><span>Catherine</span></div>
                                    </td>
                                    <td>Mary</td>
                                    <td>Walsh</td>
                                    <td>Kate Walsh</td>
                                    <td>19 Aug 1936</td>
                                    <td>15 Sauchiehall Street, Glasgow, G2 3ER</td>
                                    <td>9 Princes Street, Edinburgh, EH2 2AN</td>
                                    <td><span class="portal-ni">CW 56 78 90 A</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>Henry</span></div>
                                    </td>
                                    <td>James</td>
                                    <td>Osborne</td>
                                    <td>Harry Osborne</td>
                                    <td>11 Dec 1958</td>
                                    <td>2 Above Bar Street, Southampton, SO14 7DW</td>
                                    <td>18 Commercial Road, Portsmouth, PO1 1AA</td>
                                    <td><span class="portal-ni">HO 90 12 34 C</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ms</td>
                                    <td>
                                        <div class="portal-name"><span>Sophie</span></div>
                                    </td>
                                    <td>Louise</td>
                                    <td>Grant</td>
                                    <td>-</td>
                                    <td>07 May 1972</td>
                                    <td>11 Market Square, Nottingham, NG1 6HX</td>
                                    <td>3 Castle Hill, Lincoln, LN1 3AA</td>
                                    <td><span class="portal-ni">SG 45 23 11 D</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mr</td>
                                    <td>
                                        <div class="portal-name"><span>Michael</span></div>
                                    </td>
                                    <td>Patrick</td>
                                    <td>O'Neill</td>
                                    <td>Mick O'Neill</td>
                                    <td>25 Oct 1949</td>
                                    <td>7 Donegall Square, Belfast, BT1 5GS</td>
                                    <td>14 Strand Road, Derry, BT48 7AB</td>
                                    <td><span class="portal-ni">MO 67 89 01 B</span></td>
                                    <td class="text-nowrap">
                                        <a href="case-details.html" target="_blank" rel="noopener" class="btn-case btn-case-details">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                                <polyline points="15 3 21 3 21 9" />
                                                <line x1="10" y1="14" x2="21" y2="3" />
                                            </svg>
                                            Details
                                        </a>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="portal-actions">
                                            <button type="button" class="btn-case btn-case-none">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M15 9l-6 6M9 9l6 6" />
                                                </svg>
                                                No Records
                                            </button>
                                            <button type="button" class="btn-case btn-case-found" data-bs-toggle="modal" data-bs-target="#recordsFoundModal">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M8 12l3 3 5-6" />
                                                </svg>
                                                Records Found
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once 'inc/copyright.php' ?>
    </div>
    <?php include_once 'inc/footer.php' ?>