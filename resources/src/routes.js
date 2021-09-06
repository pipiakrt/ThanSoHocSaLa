// Home
import Home from './pages/Home'
// HomePage
import HomePage from './pages/HomePage'
// Orders
import OrderPending from './pages/Orders/pending'
// import OrderProcess from './pages/Orders/process'
import OrderSuccess from './pages/Orders/success'
import OrderCancel from './pages/Orders/cancel'
import OrderActived from './pages/Orders/actived'
import CreateOrder from './pages/Orders/create'
import EditOrder from './pages/Orders/edit'
// Manage
import Manage from './pages/Manage/index'
import EditPermission from './pages/Manage/edit'
import CreateAccount from './pages/Manage/create'
// Users
import Users from './pages/Users/index'
// Reports
import Reports from './pages/Reports/index'
// Newsletters
import Newsletters from './pages/Newsletters/index'
// Products
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
import ChuyenMuc from './pages/Posts/chuyenmuc'
import Tags from './pages/Posts/tag'
import CreatePost from './pages/Posts/create'
import EditPost from './pages/Posts/edit'
import CategoryPost from './pages/Posts/category'
// Seo
import Seo from './pages/Seo/index'
import CreateSeo from './pages/Seo/create'
import EditSeo from './pages/Seo/edit'
// Slider
import Slider from './pages/Slider/index'
// Checking
import Checking from './pages/Checking/index'
// Account
import Profile from './pages/Account/profile'
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
    // Orders
    {
        path: '/sala-backend/don-hang/cho-xac-nhan',
        component: OrderPending,
        name: 'Orders',
    },
    {
        path: '/sala-backend/don-hang/cho-kich-hoat',
        component: OrderActived,
        name: 'Orders',
    },
    {
        path: '/sala-backend/don-hang/len-don',
        component: CreateOrder,
        name: 'Orders',
    },
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
    // Checking
    {
        path: '/sala-backend/checking/danh-sach',
        component: Checking,
        name: 'Checking',
    },
    // Manage
    {
        path: '/sala-backend/quan-ly/danh-sach',
        component: Manage,
        name: 'Manage',
    },
    {
        path: '/sala-backend/quan-ly/:id/phan-quyen',
        component: EditPermission,
        name: 'Manage',
    },
    {
        path: '/sala-backend/quan-ly/them-tai-khoan',
        component: CreateAccount,
        name: 'Manage',
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
    // Reports
    {
        path: '/sala-backend/nguoi-dung/phan-hoi',
        component: Reports,
        name: 'Users',
    },
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
        component: ChuyenMuc,
        name: 'Posts',
    },
    {
        path: '/sala-backend/bai-viet/tag',
        component: Tags,
        name: 'Posts',
    },
    // Slider
    {
        path: '/sala-backend/thanh-truot/danh-sach',
        component: Slider,
        name: 'Slider',
    },
    // Account
    {
        path: '/sala-backend/tai-khoan/thong-tin',
        component: Profile,
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
