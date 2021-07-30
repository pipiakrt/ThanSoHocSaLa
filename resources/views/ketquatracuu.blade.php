@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="/css/ket-qua-tra-cuu.css">
@endpush

@section('content')

<div class="slogan bg-xanh-nhat text-white text-center">
    <h1>"KIẾN TẠO CUỘC ĐỜI HẠNH PHÚC TỪ NHỮNG CON SỐ"</h1>
</div>

<nav class="breadcrumb-cus" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <div class="container container-header2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Tra cứu</a></li>
        </ol>
    </div>
</nav>

<div class="ketqua">
    <div class="container container-header2 mb-5 pb-1">
        <div class="main-ketqua">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="conso">
                        <span class="nb">9</span>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="table-kq">
                        <div class="title text-white">
                            <h5 class="fw-normal">THÔNG TIN CÁ NHÂN</h5>
                        </div>
                        <table class="table fw-light">
                            <tbody class="text-white">
                                <tr>
                                    <td class="header"><span>HỌ VÀ TÊN</span></td>
                                    <td class="text-center"><span>DANG PHU HIEP</span></td>
                                </tr>
                                <tr>
                                    <td class="header"><span>NGÀY SINH</span></td>
                                    <td class="text-center"><span>16/10/1992</span></td>
                                </tr>
                                <tr>
                                    <td class="header"><span>ĐỊA CHỈ</span></td>
                                    <td class="text-center"><span>HA NOI</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="conso-qk text-white">
                        <div class="number number-1 text-center">1</div>
                        <div class="number number-2 text-center">2</div>
                        <div class="number number-3">3</div>
                        <div class="number number-4">4</div>
                        <div class="number number-5">5</div>
                        <div class="number number-6">6</div>
                        <div class="number number-7">7</div>
                        <div class="number number-8">8</div>
                        <div class="number number-9">9</div>
                        <div class="number number-10">10</div>
                    </div>
                    <div class="btn-tt">
                        <button>NHẬP LẠI THÔNG TIN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-ketqua mt-5 pt-5">
        <div class="container container-ketqua">
            <div class="row g-0">
                <div class="col-xl-2"></div>
                <div class="col-xl-10">
                    <div class="desc title text-white"><h3>KHÁM PHÁ CÁC CHỈ SỐ CỦA BẠN</h3></div>
                </div>
                <div class="cus col-12 col-xl-2">
                    <div class="row g-0 text-white">
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ ĐƯỜNG ĐỜI</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="eventItem3 item active" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ SƯ MỆNH</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ KHUYẾT THIẾU</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>BIỂU ĐỒ NĂNG LỰC</h3>
                                    <h3>VÀ BIỂU ĐỒ BIRTH CHART</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="eventItem3 item" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4">
                                <div class="fake-line"></div>
                                <div class="fake-icon">
                                    <div class="icon"></div>
                                </div>
                                <div class="title-item">
                                    <h3>CHỈ SỐ KHUYẾT THIẾU</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cus col-12 col-xl-10">
                    <div id="carouselExampleCaptions" class="carousel slide text-dark h-100" data-bs-interval="false" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                        <div class="conso2 my-5 pt-4">
                                            <div class="row g-0 justify-content-center">
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ BIRTH CHART</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span></div>
                                            <div><span>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>The standard Lorem Ipsum passage, used since the 1500s</span></div>
                                            <div><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                </div>
                            </div>
                            <div class="carousel-item active h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                    <div class="desc">
                                        <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                        <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                        <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                    </div>
                                    <div class="conso2 my-5 pt-4">
                                        <div class="row g-0 justify-content-center">
                                            <div class="col-md-4 text-center">
                                                <div class="bang-so">
                                                    <div class="row g-0">
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="title2 mt-5"><h4>BIỂU ĐỒ NĂNG LỰC</h4></div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <div class="bang-so">
                                                    <div class="row g-0">
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="cs1"><span>6</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="title2 mt-5"><h4>BIỂU ĐỒ BIRTH CHART</h4></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <div><span>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>1914 translation by H. Rackham</span></div>
                                        <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span></div>
                                        <div><span>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>1914 translation by H. Rackham</span></div>
                                        <div><span>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>The standard Lorem Ipsum passage, used since the 1500s</span></div>
                                        <div><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>1914 translation by H. Rackham</span></div>
                                        <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                    </div>
                                    <div class="desc">
                                        <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                        <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                        <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                        <div class="conso2 my-5 pt-4">
                                            <div class="row g-0 justify-content-center">
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ BIRTH CHART</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span></div>
                                            <div><span>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>The standard Lorem Ipsum passage, used since the 1500s</span></div>
                                            <div><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                        <div class="conso2 my-5 pt-4">
                                            <div class="row g-0 justify-content-center">
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ BIRTH CHART</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span></div>
                                            <div><span>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>The standard Lorem Ipsum passage, used since the 1500s</span></div>
                                            <div><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                </div>
                            </div>
                            <div class="carousel-item h-100">
                                <div class="slide-ketqua bg text-white fw-lighter">
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                        <div class="conso2 my-5 pt-4">
                                            <div class="row g-0 justify-content-center">
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ NĂNG LỰC</h4></div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <div class="bang-so">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="cs1"><span>6</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="title2 mt-5"><h4>BIỂU ĐỒ BIRTH CHART</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                                                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</span></div>
                                            <div><span>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>The standard Lorem Ipsum passage, used since the 1500s</span></div>
                                            <div><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>1914 translation by H. Rackham</span></div>
                                            <div><span>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</span></div>
                                        </div>
                                        <div class="desc">
                                            <div><span>Chỉ số này hé lộ con đường mà bạn sẽ trải qua trong cuộc đời này. Nó cho bạn thấy bạn sẽ gặp phải những trải nghiệm như thế nào, và bạn học được gì sau những </span></div>
                                            <div><span>trải nghiệm đó. Đây là chỉ số quan trọng nhất khi bạn xem thần số học của mình. Nó cung cấp nhiều thông tin về con người bạn và cuộc đời mà bạn sẽ sống.</span></div>
                                            <div><span>To enable screen reader support, press Ctrl+Alt+Z To learn about keyboard shortcuts, press Ctrl+slash</span></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2"></div>
                <div class="col-xl-10">
                    <div class="share-ketqua text-white">
                        <div class="titlecs text-center fw-light"><h4>CHIA SẺ NGAY</h4></div>
                        <div class="row g-0 justify-content-center mt-5">
                            <div class="col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/FB.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Facebook</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/mail.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Gửi mail</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-sm-0 col-sm-4 col-md-3 col-xl-2 text-center">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="/img/ket-qua-tra-cuu/link.png" alt="">
                                    </div>
                                    <div>
                                        <span class="chiasetitle">Lấy link</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-hr"></div>
                        <div class="titlecs text-center"><h4>nhận giải mã trực tiếp</h4></div>
                        <div class="desccs fw-lighter">
                            <div><span>Nếu bạn muốn biết chi tiết hơn về những lời khuyên phù hợp nhất, giải mã vận mệnh, thăng </span></div>
                            <div><span>trầm và ý nghĩa từng năm. Khám phá Giải mã chi tiết chuyên sâu ngay.</span></div>
                        </div>
                        <div class="btn-ketqua text-center">
                            <button>TRA CỨU CHUYÊN SÂU</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
