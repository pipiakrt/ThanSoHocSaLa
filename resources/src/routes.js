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
// Orders
import OrderPending from './pages/Orders/pending'
// import OrderProcess from './pages/Orders/process'
import OrderSuccess from './pages/Orders/success'
import OrderCancel from './pages/Orders/cancel'
import EditOrder from './pages/Orders/edit'
// // Notifications
// import Notifications from './pages/Notification/index'
// import CreateNotification from './pages/Notification/create'
// Users
import Users from './pages/Users/index'
// Reports
import Reports from './pages/Reports/index'
// Newsletters
import Newsletters from './pages/Newsletters/index'
// // Checking
// import Checking from './pages/Checking/index'
// // Menu
// import MenuSearch from './pages/Menu/search'
// import MenuCategory from './pages/Menu/category'
// // Products
import Products from './pages/Products/index'
import CreateProduct from './pages/Products/create'
import EditProduct from './pages/Products/edit'
// TuVan
import TuVan from './pages/TuVan/index'
// TraCuu
import TraCuu from './pages/TraCuu/index'
// ThanSo
import ThanSo from './pages/ThanSo/index'
import EditThanSo from './pages/ThanSo/edit'
// posts
import Posts from './pages/Posts/index'
import Tags from './pages/Posts/tag'
import CreatePost from './pages/Posts/create'
import EditPost from './pages/Posts/edit'
import CategoryPost from './pages/Posts/category'
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
// Slider
import Slider from './pages/Slider/index'
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
        path: '/sala-backend/',
        component: Home,
        name: 'Home',
    },
    // Langding Page
    // {
    //     path: '/sala-backend/langdingpage',
    //     component: LangdingPage,
    //     name: 'LangdingPage',
    // },
    // // Categories
    // {
    //     path: '/sala-backend/danh-muc/danh-sach',
    //     component: Categories,
    //     name: 'Categories',
    // },
    // {
    //     path: '/sala-backend/danh-muc/danh-muc-noi-bat',
    //     component: CategoryHightLight,
    //     name: 'Categories',
    // },
    // // Promotions
    // {
    //     path: '/sala-backend/khuyen-mai/danh-sach',
    //     component: Promotions,
    //     name: 'Promotions',
    // },
    // {
    //     path: '/sala-backend/khuyen-mai/them-moi',
    //     component: CreatePromotion,
    //     name: 'Promotions',
    // },
    // {
    //     path: '/sala-backend/khuyen-mai/:id/chinh-sua',
    //     component: EditPromotion,
    //     name: 'Promotions',
    // },
    // Orders
    {
        path: '/sala-backend/don-hang/cho-xac-nhan',
        component: OrderPending,
        name: 'Orders',
    },
    // {
    //     path: '/sala-backend/don-hang/dang-giao',
    //     component: OrderProcess,
    //     name: 'Orders',
    // },
    {
        path: '/sala-backend/don-hang/:id/chinh-sua',
        component: EditOrder,
        name: 'Orders',
    },
    {
        path: '/sala-backend/don-hang/hoat-dong',
        component: OrderSuccess,
        name: 'Orders',
    },
    {
        path: '/sala-backend/don-hang/don-huy',
        component: OrderCancel,
        name: 'Orders',
    },
    // Users
    {
        path: '/sala-backend/nguoi-dung/danh-sach',
        component: Users,
        name: 'Users',
    },
    // Newsletters
    {
        path: '/sala-backend/nguoi-dung/newsletters',
        component: Newsletters,
        name: 'Users',
    },
    // // Notifications
    // {
    //     path: '/sala-backend/thong-bao/danh-sach',
    //     component: Notifications,
    //     name: 'Notifications',
    // },
    // {
    //     path: '/sala-backend/thong-bao/them-moi',
    //     component: CreateNotification,
    //     name: 'Notifications',
    // },
    // Reports
    {
        path: '/sala-backend/nguoi-dung/phan-hoi',
        component: Reports,
        name: 'Users',
    },
    // // Reports
    // {
    //     path: '/sala-backend/checking',
    //     component: Checking,
    //     name: 'Checking',
    // },
    // Products
    {
        path: '/sala-backend/san-pham/danh-sach',
        component: Products,
        name: 'Products',
    },
    {
        path: '/sala-backend/san-pham/them-moi',
        component: CreateProduct,
        name: 'Products',
    },
    {
        path: '/sala-backend/san-pham/:id/chinh-sua',
        component: EditProduct,
        name: 'Products',
    },
    // Seo
    {
        path: '/sala-backend/seo/danh-sach',
        component: Seo,
        name: 'Seo',
    },
    {
        path: '/sala-backend/seo/them-moi',
        component: CreateSeo,
        name: 'Seo',
    },
    {
        path: '/sala-backend/seo/:id/chinh-sua',
        component: EditSeo,
        name: 'Seo',
    },
    // TraCuu
    {
        path: '/sala-backend/tra-cuu/danh-sach',
        component: TraCuu,
        name: 'TraCuu',
    },
    // TuVan
    {
        path: '/sala-backend/tu-van/danh-sach',
        component: TuVan,
        name: 'TuVan',
    },
    // ThanSo
    {
        path: '/sala-backend/luan-giai/danh-sach',
        component: ThanSo,
        name: 'ThanSo',
    },
    {
        path: '/sala-backend/luan-giai/:id/chinh-sua',
        component: EditThanSo,
        name: 'ThanSo',
    },
    // Posts
    {
        path: '/sala-backend/bai-viet/danh-sach',
        component: Posts,
        name: 'Posts',
    },
    {
        path: '/sala-backend/bai-viet/them-moi',
        component: CreatePost,
        name: 'Posts',
    },
    {
        path: '/sala-backend/bai-viet/:id/chinh-sua',
        component: EditPost,
        name: 'Posts',
    },
    {
        path: '/sala-backend/bai-viet/danh-muc',
        component: CategoryPost,
        name: 'Posts',
    },
    {
        path: '/sala-backend/bai-viet/chuyen-muc',
        component: Tags,
        name: 'Posts',
    },
    // {
    //     path: '/sala-backend/than-so/danh-sach',
    //     component: ThanSo,
    //     name: 'ThanSo',
    // },
    // {
    //     path: '/sala-backend/than-so/:id/chinh-sua',
    //     component: EditThanSo,
    //     name: 'ThanSo',
    // },
    // {
    //     path: '/sala-backend/bai-viet/danh-muc',
    //     component: CategoryPost,
    //     name: 'Posts',
    // },
    // {
    //     path: '/sala-backend/bai-viet/bai-viet-new',
    //     component: PostNew,
    //     name: 'Posts',
    // },
    // {
    //     path: '/sala-backend/bai-viet/bai-viet-hot',
    //     component: PostHot,
    //     name: 'Posts',
    // },
    // Menu
    // {
    //     path: '/sala-backend/menu/tim-kiem',
    //     component: MenuSearch,
    //     name: 'Menu',
    // },
    // {
    //     path: '/sala-backend/menu/danh-muc',
    //     component: MenuCategory,
    //     name: 'Menu',
    // },
    // // Banner
    // {
    //     path: '/sala-backend/anh-bia/danh-sach',
    //     component: Banner,
    //     name: 'Banner',
    // },
    // Slider
    {
        path: '/sala-backend/thanh-truot/danh-sach',
        component: Slider,
        name: 'Slider',
    },
    // Account
    {
        path: '/sala-backend/tai-khoan',
        component: Account,
        name: 'Account',
    },
    {
        path: '/sala-backend/tai-khoan/thong-tin',
        component: Profile,
        name: 'Account',
    },
    {
        path: '/sala-backend/tai-khoan/them-tai-khoan',
        component: CreateUser,
        name: 'Account',
    },
    {
        path: '/sala-backend/tai-khoan/mat-khau',
        component: Password,
        name: 'Account',
    },
    // HomePage
    {
        path: '/sala-backend/homepage',
        component: HomePage,
        name: 'HomePage',
    },
    // FileManager
    {
        path: '/sala-backend/tep-tin',
        component: FileManager,
        name: 'FileManager',
    },
    // error
    {
        path: '/sala-backend/:pathMatch(.*)*',
        component: Error,
        name: '404',
    },
];

export default routes;
