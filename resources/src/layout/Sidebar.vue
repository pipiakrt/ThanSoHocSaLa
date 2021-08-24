<style scoped>
    .logo {
        width: 150px;
    }
</style>

<template>
<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <router-link to="/sala-backend/" class="brand-logo">
            <img alt="Logo" class="logo" src="/img/logo/a1.png" />
        </router-link>
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li v-for="(menu, i) in menus" :key="'menu-' + i" :class="getMenuClass(menu)">
                    <template v-if="menu.type == 1">
                        <h4 class="menu-text" v-text="menu.name"></h4>
                    </template>
                    <template v-if="menu.type == 2">
                        <router-link :to="{ name: menu.routeName }" class="menu-link">
                            <span class="svg-icon menu-icon" v-html="menu.icon"></span>
                            <span class="menu-text" v-text="menu.name"></span>
                        </router-link>
                    </template>
                    <template v-if="menu.type == 3">
                        <a class="menu-link menu-toggle" @click="menu.active = true">
                            <span class="svg-icon menu-icon" v-html="menu.icon"></span>
                            <span class="menu-text" v-text="menu.name"></span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">
                            <i class="menu-arrow"></i>
                            <ul class="menu-subnav">
                                <li v-for="(item, i) in menu.sub" :key="'sub-' + i" :class="$route.path == item.url ? 'menu-item menu-item-active' : 'menu-item'" aria-haspopup="true">
                                    <a @click="$router.push(item.url)" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text" v-text="item.name"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </template>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            menus: [
                {
                    routeName: 'Home',
                    name: 'Dashboard',
                    icon: `
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                                    <path
                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    ></path>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                // {
                //     name: 'Page & Thông báo',
                //     type: 1,
                // },
                // {
                //     routeName: 'Checking',
                //     name: 'Checking',
                //     icon: `
                //         <span class="svg-icon svg-icon-primary svg-icon-2x">
                //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                     <rect x="0" y="0" width="24" height="24" />
                //                     <path
                //                         d="M6.58578644,8 L5.17157288,6.58578644 C4.78104858,6.19526215 4.78104858,5.56209717 5.17157288,5.17157288 C5.56209717,4.78104858 6.19526215,4.78104858 6.58578644,5.17157288 L8,6.58578644 L9.41421356,5.17157288 C9.80473785,4.78104858 10.4379028,4.78104858 10.8284271,5.17157288 C11.2189514,5.56209717 11.2189514,6.19526215 10.8284271,6.58578644 L9.41421356,8 L10.8284271,9.41421356 C11.2189514,9.80473785 11.2189514,10.4379028 10.8284271,10.8284271 C10.4379028,11.2189514 9.80473785,11.2189514 9.41421356,10.8284271 L8,9.41421356 L6.58578644,10.8284271 C6.19526215,11.2189514 5.56209717,11.2189514 5.17157288,10.8284271 C4.78104858,10.4379028 4.78104858,9.80473785 5.17157288,9.41421356 L6.58578644,8 Z"
                //                         fill="#000000"
                //                         opacity="0.3"
                //                     />
                //                     <path
                //                         d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z"
                //                         fill="#000000"
                //                     />
                //                 </g>
                //             </svg>
                //         </span>
                //     `,
                //     type: 2,
                // },
                // {
                //     routeName: 'LangdingPage',
                //     name: 'Langding Page',
                //     icon:  `
                //             <span class="svg-icon svg-icon-primary svg-icon-2x">
                //                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                         <rect x="0" y="0" width="24" height="24"></rect>
                //                         <path
                //                             d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                //                             fill="#000000"
                //                             fill-rule="nonzero"
                //                             transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)"
                //                         ></path>
                //                         <path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3"></path>
                //                     </g>
                //                 </svg>
                //             </span>
                //             `,
                //     type: 2,
                // },
                // {
                //     routeName: 'Notifications',
                //     name: 'Thông báo',
                //     icon:  `
                //             <span class="svg-icon svg-icon-primary svg-icon-2x">
                //                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                         <rect x="0" y="0" width="24" height="24" />
                //                         <path
                //                             d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                //                             fill="#000000"
                //                         />
                //                         <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                //                     </g>
                //                 </svg>
                //             </span>
                //              `,
                //     type: 3,
                //     sub: [
                //         {
                //             name: 'Danh sách',
                //             url: '/sala-backend/thong-bao/danh-sach'
                //         },
                //         {
                //             name: 'Thêm mới',
                //             url: '/sala-backend/thong-bao/them-moi'
                //         }
                //     ]
                // },
                {
                    name: 'Chức năng',
                    type: 1,
                },
                // {
                //     routeName: 'Categories',
                //     name: 'Danh muc',
                //     icon:  `
                //             <span class="svg-icon svg-icon-primary svg-icon-2x">
                //                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                         <rect x="0" y="0" width="24" height="24" />
                //                         <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                //                         <path
                //                             d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                //                             fill="#000000"
                //                             opacity="0.3"
                //                         />
                //                     </g>
                //                 </svg>
                //             </span>
                //             `,
                //     type: 3,
                //     sub: [
                //         {
                //             name: 'Danh sách',
                //             url: '/sala-backend/danh-muc/danh-sach'
                //         },
                //         {
                //             name: 'Danh mục nổi bật',
                //             url: '/sala-backend/danh-muc/danh-muc-noi-bat'
                //         },
                //     ]
                // },
                {
                    name: 'Sản phẩm',
                    routeName: 'Products',
                    icon:  `
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                        `,
                    type: 3,
                    sub: [
                        {
                            name: 'Danh sách',
                            url: '/sala-backend/san-pham/danh-sach'
                        },
                        {
                            name: 'Thêm mới',
                            url: '/sala-backend/san-pham/them-moi'
                        }
                    ]
                },
                // {
                //     name: 'Khuyễn Mãi',
                //     routeName: 'Promotions',
                //     icon: `
                //         <span class="svg-icon svg-icon-primary svg-icon-2x">
                //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                     <rect x="0" y="0" width="24" height="24"></rect>
                //                     <path
                //                         d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                //                         fill="#000000"
                //                         opacity="0.3"
                //                         transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"
                //                     ></path>
                //                     <path
                //                         d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                //                         fill="#000000"
                //                         transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"
                //                     ></path>
                //                     <path
                //                         d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                //                         fill="#000000"
                //                         opacity="0.3"
                //                         transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"
                //                     ></path>
                //                     <path
                //                         d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                //                         fill="#000000"
                //                         opacity="0.3"
                //                         transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"
                //                     ></path>
                //                 </g>
                //             </svg>
                //         </span>
                //     `,
                //     type: 3,
                //     sub: [
                //         {
                //             name: 'Danh sách',
                //             url: '/sala-backend/khuyen-mai/danh-sach'
                //         },
                //         {
                //             name: 'Thêm mới',
                //             url: '/sala-backend/khuyen-mai/them-moi'
                //         }
                //     ]
                // },
                {
                    name: 'Bài Viết',
                    routeName: 'Posts',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 3,
                    sub: [
                        {
                            name: 'Danh sách',
                            url: '/sala-backend/bai-viet/danh-sach'
                        },
                        {
                            name: 'Thêm mới',
                            url: '/sala-backend/bai-viet/them-moi'
                        },
                        {
                            name: 'Danh mục',
                            url: '/sala-backend/bai-viet/danh-muc'
                        },
                        {
                            name: 'Chuyên mục',
                            url: '/sala-backend/bai-viet/chuyen-muc'
                        },
                    ]
                },
                {
                    name: 'Seo Page',
                    routeName: 'Seo',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    />
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 3,
                    sub: [
                        {
                            name: 'Danh sách',
                            url: '/sala-backend/seo/danh-sach'
                        },
                        {
                            name: 'Thêm mới',
                            url: '/sala-backend/seo/them-moi'
                        },
                    ]
                },
                //  {
                //     name: 'Thần Số',
                //     routeName: 'ThanSo',
                //     icon: `
                //         <span class="svg-icon svg-icon-primary svg-icon-2x">
                //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                     <rect x="0" y="0" width="24" height="24"/>
                //                     <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                //                     <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                //                 </g>
                //             </svg>
                //         </span>
                //     `,
                //     type: 3,
                //     sub: [
                //         {
                //             name: 'Danh sách',
                //             url: '/sala-backend/than-so/danh-sach'
                //         },
                //         {
                //             name: 'Thêm mới',
                //             url: '/sala-backend/than-so/them-moi'
                //         },
                //     ]
                // },
                {
                    name: 'Users',
                    type: 1,
                },
                {
                    name: 'Đơn hàng',
                    routeName: 'Orders',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
                                        fill="#000000"
                                    ></path>
                                    <path
                                        d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    ></path>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 3,
                    sub: [
                        {
                            name: 'Chờ xác nhận',
                            url: '/sala-backend/don-hang/cho-xac-nhan'
                        },
                        // {
                        //     name: 'Đang giao hàng',
                        //     url: '/sala-backend/don-hang/dang-giao'
                        // },
                        {
                            name: 'Hoạt động',
                            url: '/sala-backend/don-hang/hoat-dong'
                        },
                        {
                            name: 'Đơn Hủy',
                            url: '/sala-backend/don-hang/don-huy'
                        },
                    ]
                },
                {
                    name: 'Người dùng',
                    routeName: 'Users',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                        opacity="0.3"
                                    ></path>
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                    ></path>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 3,
                    sub: [
                        {
                            name: 'Danh sách',
                            url: '/sala-backend/nguoi-dung/danh-sach'
                        },
                        {
                            name: 'Phản hồi',
                            url: '/sala-backend/nguoi-dung/phan-hoi'
                        },
                        {
                            name: 'Newsletters',
                            url: '/sala-backend/nguoi-dung/newsletters'
                        },
                    ]
                },
                {
                    name: 'Setting',
                    type: 1,
                },
                // {
                //     name: 'Menu',
                //     routeName: 'Menu',
                //     icon: `
                //         <span class="svg-icon svg-icon-primary svg-icon-2x">
                //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                     <rect x="0" y="0" width="24" height="24"></rect>
                //                     <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                //                     <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                //                 </g>
                //             </svg>
                //         </span>
                //     `,
                //     type: 3,
                //     sub: [
                //         {
                //             name: 'Menu Tìm kiếm',
                //             url: '/sala-backend/menu/tim-kiem'
                //         },
                //         {
                //             name: 'Menu Danh mục',
                //             url: '/sala-backend/menu/danh-muc'
                //         }
                //     ]
                // },
                {
                    name: 'Lượt Yêu Cầu Tư Vấn',
                    routeName: 'TuVan',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                {
                    name: 'Lượt Tra Cứu',
                    routeName: 'TraCuu',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                {
                    name: 'Luận Giải',
                    routeName: 'ThanSo',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M1,12 L1,14 L6,14 L6,12 L1,12 Z M0,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,15 C21,15.5522847 20.5522847,16 20,16 L0,16 C-0.55228475,16 -1,15.5522847 -1,15 L-1,11 C-1,10.4477153 -0.55228475,10 0,10 Z"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                        transform="translate(10.000000, 13.000000) rotate(-225.000000) translate(-10.000000, -13.000000) "
                                    />
                                    <path
                                        d="M17.5,12 L18.5,12 C18.7761424,12 19,12.2238576 19,12.5 L19,13.5 C19,13.7761424 18.7761424,14 18.5,14 L17.5,14 C17.2238576,14 17,13.7761424 17,13.5 L17,12.5 C17,12.2238576 17.2238576,12 17.5,12 Z M20.5,9 L21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 L20.5,11 C20.2238576,11 20,10.7761424 20,10.5 L20,9.5 C20,9.22385763 20.2238576,9 20.5,9 Z M21.5,13 L22.5,13 C22.7761424,13 23,13.2238576 23,13.5 L23,14.5 C23,14.7761424 22.7761424,15 22.5,15 L21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,13.5 C21,13.2238576 21.2238576,13 21.5,13 Z"
                                        fill="#000000"
                                        opacity="0.3"
                                    />
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                {
                    routeName: 'HomePage',
                    name: 'HomePage',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000"
                                    />
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                {
                    name: 'Sliders',
                    routeName: 'Slider',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z"
                                        fill="#000000"
                                    />
                                    <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1" />
                                </g>
                            </svg>
                        </span>

                    `,
                    type: 2,
                },
                // {
                //     name: 'Ảnh Phụ',
                //     routeName: 'Banner',
                //     icon: `
                //         <span class="svg-icon svg-icon-primary svg-icon-2x">
                //             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                //                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                //                     <rect x="0" y="0" width="24" height="24" />
                //                     <path
                //                         d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M3,10 L13,10 C13.5522847,10 14,10.4477153 14,11 L14,19 C14,19.5522847 13.5522847,20 13,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,11 C2,10.4477153 2.44771525,10 3,10 Z"
                //                         fill="#000000"
                //                     />
                //                     <rect fill="#000000" opacity="0.3" x="16" y="10" width="5" height="10" rx="1" />
                //                 </g>
                //             </svg>
                //         </span>
                //     `,
                //     type: 2,
                // },
                {
                    name: 'Quản Lý',
                    type: 1,
                },
                {
                    routeName: 'FileManager',
                    name: 'Tệp Tin',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,21 L21.5,21 C22.3284271,21 23,20.3284271 23,19.5 L23,8.5 C23,7.67157288 22.3284271,7 21.5,7 L11,7 L8.43933983,4.43933983 C8.15803526,4.15803526 7.77650439,4 7.37867966,4 L4.5,4 C3.67157288,4 3,4.67157288 3,5.5 L3,19.5 C3,20.3284271 3.67157288,21 4.5,21 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M2.5,19 L19.5,19 C20.3284271,19 21,18.3284271 21,17.5 L21,6.5 C21,5.67157288 20.3284271,5 19.5,5 L9,5 L6.43933983,2.43933983 C6.15803526,2.15803526 5.77650439,2 5.37867966,2 L2.5,2 C1.67157288,2 1,2.67157288 1,3.5 L1,17.5 C1,18.3284271 1.67157288,19 2.5,19 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 2,
                },
                {
                    name: 'Tài Khoản',
                    routeName: 'Account',
                    icon: `
                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                    />
                                </g>
                            </svg>
                        </span>
                    `,
                    type: 3,
                    sub: [
                        {
                            name: 'Thông tin',
                            url: '/sala-backend/tai-khoan/thong-tin'
                        },
                        {
                            name: 'Danh sách',
                            url: '/sala-backend/tai-khoan'
                        },
                        {
                            name: 'Thêm tài khoản',
                            url: '/sala-backend/tai-khoan/them-tai-khoan'
                        },
                        {
                            name: 'Mật khẩu',
                            url: '/sala-backend/tai-khoan/mat-khau'
                        },
                    ]
                },
            ]
        }
    },
    methods: {
        getMenuClass(menu) {
            if (menu.type == 1) {
                return 'menu-section'
            }
            else if (menu.type == 2) {
                if (this.$route.name == menu.routeName) {
                    return 'menu-item menu-item-active'
                }
                else {
                    return 'menu-item'
                }
            }
            else if (menu.type == 3){
                if (this.$route.name == menu.routeName) {
                    return 'menu-item menu-item-submenu menu-item-open'
                }
                else {
                    return 'menu-item menu-item-submenu'
                }
            }
        }
    },
}
</script>
