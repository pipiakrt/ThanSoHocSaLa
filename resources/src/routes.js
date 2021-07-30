// Home
import Home from './pages/Home'
// HomePage
import HomePage from './pages/HomePage'
// Langding Page
// import LangdingPage from './pages/LangdingPage'
// // Categories
// import Categories from './pages/Categories/index'
// import CategoryHightLight from './pages/Categories/hightlight'
// // Promotions
// import Promotions from './pages/Promotion/index'
// import CreatePromotion from './pages/Promotion/create'
// import EditPromotion from './pages/Promotion/edit'
// // Orders
// import OrderPending from './pages/Orders/pending'
// import OrderProcess from './pages/Orders/process'
// import OrderSuccess from './pages/Orders/success'
// import OrderCancel from './pages/Orders/cancel'
// // Notifications
// import Notifications from './pages/Notification/index'
// import CreateNotification from './pages/Notification/create'
// // Users
// import Users from './pages/Users/index'
// // Reports
// import Reports from './pages/Reports/index'
// // Checking
// import Checking from './pages/Checking/index'
// // Menu
// import MenuSearch from './pages/Menu/search'
// import MenuCategory from './pages/Menu/category'
// // Products
import Products from './pages/Products/index'
import CreateProduct from './pages/Products/create'
import EditProduct from './pages/Products/edit'
// posts
import Posts from './pages/Posts/index'
import CreatePost from './pages/Posts/create'
import EditPost from './pages/Posts/edit'
// Seo
import Seo from './pages/Seo/index'
import CreateSeo from './pages/Seo/create'
import EditSeo from './pages/Seo/edit'
// ThanSo
// import ThanSo from './pages/ThanSo/index'
// import EditThanSo from './pages/ThanSo/edit'
// import CategoryPost from './pages/Posts/category'
// import PostNew from './pages/Posts/new'
// import PostHot from './pages/Posts/hot'
// // Banner
// import Banner from './pages/Banner/index'
// // Slider
// import Slider from './pages/Slider/index'
// Account
import Account from './pages/Account/index'
import Profile from './pages/Account/profile'
import CreateUser from './pages/Account/create'
import Password from './pages/Account/password'
// FileManager
import FileManager from './pages/FileManager/index'
// error
import Error from './pages/Error'

const routes = [
    // Home
    {
        path: '/admin/',
        component: Home,
        name: 'Home',
    },
    // Langding Page
    // {
    //     path: '/admin/langdingpage',
    //     component: LangdingPage,
    //     name: 'LangdingPage',
    // },
    // // Categories
    // {
    //     path: '/admin/danh-muc/danh-sach',
    //     component: Categories,
    //     name: 'Categories',
    // },
    // {
    //     path: '/admin/danh-muc/danh-muc-noi-bat',
    //     component: CategoryHightLight,
    //     name: 'Categories',
    // },
    // // Promotions
    // {
    //     path: '/admin/khuyen-mai/danh-sach',
    //     component: Promotions,
    //     name: 'Promotions',
    // },
    // {
    //     path: '/admin/khuyen-mai/them-moi',
    //     component: CreatePromotion,
    //     name: 'Promotions',
    // },
    // {
    //     path: '/admin/khuyen-mai/:id/chinh-sua',
    //     component: EditPromotion,
    //     name: 'Promotions',
    // },
    // // Orders
    // {
    //     path: '/admin/don-hang/cho-xac-nhan',
    //     component: OrderPending,
    //     name: 'Orders',
    // },
    // {
    //     path: '/admin/don-hang/dang-giao',
    //     component: OrderProcess,
    //     name: 'Orders',
    // },
    // {
    //     path: '/admin/don-hang/hoan-thanh',
    //     component: OrderSuccess,
    //     name: 'Orders',
    // },
    // {
    //     path: '/admin/don-hang/don-huy',
    //     component: OrderCancel,
    //     name: 'Orders',
    // },
    // // Users
    // {
    //     path: '/admin/nguoi-dung/danh-sach',
    //     component: Users,
    //     name: 'Users',
    // },
    // // Notifications
    // {
    //     path: '/admin/thong-bao/danh-sach',
    //     component: Notifications,
    //     name: 'Notifications',
    // },
    // {
    //     path: '/admin/thong-bao/them-moi',
    //     component: CreateNotification,
    //     name: 'Notifications',
    // },
    // // Reports
    // {
    //     path: '/admin/nguoi-dung/phan-hoi',
    //     component: Reports,
    //     name: 'Users',
    // },
    // // Reports
    // {
    //     path: '/admin/checking',
    //     component: Checking,
    //     name: 'Checking',
    // },
    // Products
    {
        path: '/admin/san-pham/danh-sach',
        component: Products,
        name: 'Products',
    },
    {
        path: '/admin/san-pham/them-moi',
        component: CreateProduct,
        name: 'Products',
    },
    {
        path: '/admin/san-pham/:id/chinh-sua',
        component: EditProduct,
        name: 'Products',
    },
    // Seo
    {
        path: '/admin/seo/danh-sach',
        component: Seo,
        name: 'Seo',
    },
    {
        path: '/admin/seo/them-moi',
        component: CreateSeo,
        name: 'Seo',
    },
    {
        path: '/admin/seo/:id/chinh-sua',
        component: EditSeo,
        name: 'Seo',
    },
    // Posts
    {
        path: '/admin/bai-viet/danh-sach',
        component: Posts,
        name: 'Posts',
    },
    {
        path: '/admin/bai-viet/them-moi',
        component: CreatePost,
        name: 'Posts',
    },
    {
        path: '/admin/bai-viet/:id/chinh-sua',
        component: EditPost,
        name: 'Posts',
    },
    // {
    //     path: '/admin/than-so/danh-sach',
    //     component: ThanSo,
    //     name: 'ThanSo',
    // },
    // {
    //     path: '/admin/than-so/:id/chinh-sua',
    //     component: EditThanSo,
    //     name: 'ThanSo',
    // },
    // {
    //     path: '/admin/bai-viet/danh-muc',
    //     component: CategoryPost,
    //     name: 'Posts',
    // },
    // {
    //     path: '/admin/bai-viet/bai-viet-new',
    //     component: PostNew,
    //     name: 'Posts',
    // },
    // {
    //     path: '/admin/bai-viet/bai-viet-hot',
    //     component: PostHot,
    //     name: 'Posts',
    // },
    // Menu
    // {
    //     path: '/admin/menu/tim-kiem',
    //     component: MenuSearch,
    //     name: 'Menu',
    // },
    // {
    //     path: '/admin/menu/danh-muc',
    //     component: MenuCategory,
    //     name: 'Menu',
    // },
    // // Banner
    // {
    //     path: '/admin/anh-bia/danh-sach',
    //     component: Banner,
    //     name: 'Banner',
    // },
    // // Slider
    // {
    //     path: '/admin/thanh-truot/danh-sach',
    //     component: Slider,
    //     name: 'Slider',
    // },
    // Account
    {
        path: '/admin/tai-khoan',
        component: Account,
        name: 'Account',
    },
    {
        path: '/admin/tai-khoan/thong-tin',
        component: Profile,
        name: 'Account',
    },
    {
        path: '/admin/tai-khoan/them-tai-khoan',
        component: CreateUser,
        name: 'Account',
    },
    {
        path: '/admin/tai-khoan/mat-khau',
        component: Password,
        name: 'Account',
    },
    // HomePage
    {
        path: '/admin/homepage',
        component: HomePage,
        name: 'HomePage',
    },
    // FileManager
    {
        path: '/admin/tep-tin',
        component: FileManager,
        name: 'FileManager',
    },
    // error
    {
        path: '/admin/:pathMatch(.*)*',
        component: Error,
        name: '404',
    },
];

export default routes;
