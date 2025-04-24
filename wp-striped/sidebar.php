<!-- Sidebar -->
<div id="sidebar">
    <!-- Logo -->
    <h1 id="logo">
        <a href="<?php bloginfo('siteurl'); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </h1>

    <?php
    /**
     * The sidebar containing the main widget area.
     *
     * @package annina
     */

    if (is_active_sidebar( 'sidebar-1' ) ) { ?>
    <div id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
    <?php } ?>

    <?php /*
    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li class="current"><a href="#">آخرین مطلب</a></li>
            <li><a href="#">بایگانی‌ها</a></li>
            <li><a href="#">درباره‌ی من</a></li>
            <li><a href="#">تماس با من</a></li>
        </ul>
    </nav>

    <!-- Search -->
    <section class="box search">
        <form method="post" action="#">
            <input type="text" class="text" name="search" placeholder="جستجو"/>
        </form>
    </section>

    <!-- Recent Posts -->
    <section class="box recent-posts">
        <header>
            <h2>مطالب اخیر</h2>
        </header>
        <ul>
            <li><a href="#">اولین عنوان خبر</a></li>
            <li><a href="#">دومین عنوان خبر</a></li>
            <li><a href="#">عنوان یک مطلب دیگر</a></li>
            <li><a href="#">و باز هم مطلب دیگر</a></li>
            <li><a href="#">این هم یک مطلب دیگر</a></li>
        </ul>
    </section>

    <!-- Recent Comments -->
    <section class="box recent-comments">
        <header>
            <h2>آخرین دیدگاه‌ها</h2>
        </header>
        <ul>
            <li>حسن درباره <a href="#">اولین عنوان خبر</a></li>
            <li>فاطمه درباره <a href="#">یکی دیگر از مطالب</a></li>
            <li>حسن درباره <a href="#">عنوان یک مطلب دیگر</a></li>
        </ul>
    </section>

    <!-- Calendar -->
    <section class="box calendar">
        <div class="inner">
            <table>
                <caption>جولای ۲۰۱۴</caption>
                <thead>
                <tr>
                    <th scope="col" title="Monday">M</th>
                    <th scope="col" title="Tuesday">T</th>
                    <th scope="col" title="Wednesday">W</th>
                    <th scope="col" title="Thursday">T</th>
                    <th scope="col" title="Friday">F</th>
                    <th scope="col" title="Saturday">S</th>
                    <th scope="col" title="Sunday">S</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="4" class="pad"><span>&nbsp;</span></td>
                    <td><span>1</span></td>
                    <td><span>2</span></td>
                    <td><span>3</span></td>
                </tr>
                <tr>
                    <td><span>4</span></td>
                    <td><span>5</span></td>
                    <td><a href="#">6</a></td>
                    <td><span>7</span></td>
                    <td><span>8</span></td>
                    <td><span>9</span></td>
                    <td><a href="#">10</a></td>
                </tr>
                <tr>
                    <td><span>11</span></td>
                    <td><span>12</span></td>
                    <td><span>13</span></td>
                    <td class="today"><a href="#">14</a></td>
                    <td><span>15</span></td>
                    <td><span>16</span></td>
                    <td><span>17</span></td>
                </tr>
                <tr>
                    <td><span>18</span></td>
                    <td><span>19</span></td>
                    <td><span>20</span></td>
                    <td><span>21</span></td>
                    <td><span>22</span></td>
                    <td><a href="#">23</a></td>
                    <td><span>24</span></td>
                </tr>
                <tr>
                    <td><a href="#">25</a></td>
                    <td><span>26</span></td>
                    <td><span>27</span></td>
                    <td><span>28</span></td>
                    <td class="pad" colspan="3"><span>&nbsp;</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    */ ?>

    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; ۱۳۹۴ - احسان محمدی</li>
        <li>استفاده از مطالب این وب‌سایت با ذکر آدرس سایت و نام نویسنده بلامانع
            می‌باشد.
        </li>
        <li>طراحی قالب از:<br><a style="font-family: Tahoma, sans;"
                href="http://html5up.net">HTML5 UP</a></li>
    </ul>

</div>
