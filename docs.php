<?php 
    $title = "Documentation";
    include("incl/header.php"); 
?>

<main class="docs">
    <h1>Documentation</h1>

    <h2>Code Structure</h2>
    <p>
        The site is written in PHP and HTML. Most of the pages/files 
        mix those two langues together. 
        All CSS styling is gathered in one single file 
        <code>css/style.css</code>.
    </p>
    <p>
        There are three types of pages in this project:
    </p>
    <ul>
        <li>
            Single content page - like <code>index.php</code> and <code>contact.php</code>, 
            where data is retrieved from the database and showed as-is on the page.
        </li>
        <li>
            Multi page - like <code>about.php</code> and <code>recources.php</code>. 
            These pages have sub-menus, each preenting a separate article, but gathered under 
            one main subject.
        </li>
        <li>
            Dynamic content page - like <code>roads.php</code> and <code>gallery.php</code>. 
            These are stand-alone pages that show different content, depending on url 
            queries or information in session.
        </li>
    </ul>

    <p>
        All subpages of a multi page use the same layout that is defined in <code>view/multipage.php</code>, 
        and a standard side navigation, defined in <code>view/multipage-nav.php</code>. 
        The side navigation is generated automatically based on the <code>$pages</code> array 
        in each main multipage file (e.g., <code>about.php</code>). 
        The subpages are gathered in a diroctory with the same name as the main multipage file 
        (e.g., <code>/about</code>).
    </p>

    <p>
        All pages include <code>incl/header.php</code> and <code>incl/footer.php</code>. 
        The first file consists of <code>&lt;head&gt;</code> content and the visual top part 
        of the site: logo, search field and main navigation. The latter - the site footer, 
        which consists of copyright line with the year (displays current year dynamically), 
        link to page about the developer (<i>moi</i>) and email contact information for the 
        NVM project leader.
    </p>

    <p>
        There is a separate file with functions <code>src/functions.php</code>, which 
        gathers the processes that are used several times within the application, 
        such as connecting to and quering the database. This way the code of the PHP pages 
        is more clean and easier to read.
    </p>

    <p>
        The <code>.htaccess</code> file defines the index page for the project, 
        so that it would open automatically, instead of the directory content. 
        <i>I also have tried to set a global 404 page, but unfortunatelly it is not 
        working.</i>
    </p>

    <p>
        The <code>config.php</code> stores the DSN connection string to the database, and 
        error handling. The session is also initiated there. 
    </p>

    <h2>Responsivne Design</h2>
    <p>
        By using media queries in <code>css/style.css</code> file, the site is 
        made responsive. 
        Some elements are stacked, instead of 
        being positioned next to each other. Some change size (width/height). 
        Additionally, when creating the desktop layout, I often 
        use <code>display: flex</code>, which makes the site responsive 
        (to some extend) without any additional rules.
    </p>
    <p>
        So the main things I focused on when making the site resposinve were: 
        multipage layout (due to its extra side navigation), the header and the footer, 
        and presentation of exhibition objects. But I think that the whole site 
        works just fine on smaller screens.
    </p>

    <h2>Improvements</h2>
    <p>
        First of all, the main menu bar has to be made "prettier" in responsive layout. 
        I imagine it would have to be a <code>javascript</code> solution. 
        That is why I didn't prioritized this feature.
    </p>
    <p>
        I guess, the code of the PHP pages can be refactored and separated, 
        so that it is easier to see the flow and understand the purpose of the code. 
        Possibly, the dynamic pages should be converted to multipages instead, 
        again, so that the code looks more clean.
    </p>
    <p>
        The search feature could be extended with additional search options. 
        Also the search results might be made more persisten. Right now the search 
        results list is removed from the session as soon as it is shown, which means 
        that the user can't navigate back and force among the slected objects 
        whithout having to initiate search again and again.
    </p>
    <p>
        Additionally, the header can be implemented as <code>sticky</code>, 
        so it is always available to the user. And a "scroll-to-top" button 
        would be nice on some pages with long content.
    </p>
</main>

<?php 
    include("incl/footer.php"); 
?>
