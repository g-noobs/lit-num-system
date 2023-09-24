<style>
.custom-dropdown {
    position: relative;
    display: inline-block;
}

.custom-dropdown-toggle {
    padding: 10px;
    background-color: #fff;
    border: 2px solid #E58A00;
    border-radius: 10px;
    color: #E58A00;
    cursor: pointer;
}

.custom-dropdown-toggle .caret {
    margin-left: 5px;
}

.custom-dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1;
    display: none;
    min-width: 150px;
    padding: 5px 0;
    margin: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    list-style: none;
}

.custom-dropdown-menu li {
    padding: 5px;
}

.custom-dropdown-menu li a {
    display: block;
    padding: 5px;
    color: #333;
    text-decoration: none;
}

.custom-dropdown-menu li.divider {
    margin: 5px 0;
    border-top: 1px solid #ccc;
}

.custom-dropdown-menu li a:hover {
    background-color: #f5f5f5;
}

.custom-dropdown-toggle .caret {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    margin-left: 5px;
}
</style>