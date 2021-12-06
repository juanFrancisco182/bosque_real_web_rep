'use strict'
window.onload=function(){
    //responsive nav bar

    const menu = document.querySelector('nav')

    menu.setAttribute('class', 'main-nav ')

    const menuHeading = document.querySelector('nav > div')
    menuHeading.setAttribute('class', 'main-nav__heading mobile-style')


    const toggleButton = menu.querySelector('button')
    toggleButton.setAttribute('id', 'toggle-nav')

    const menuUl = document.querySelector('nav > ul')
    menuUl.setAttribute('class', 'main-nav__menu')

    const menuLis = document.querySelectorAll('nav > ul > li')
    for (const menuLi of menuLis) {
        menuLi.setAttribute('class', 'main-nav__menu-item')

        if (menuLi.querySelector('ul') !== null) {
            menuLi.classList.add('main-nav__menu-item--dropdown')
        }
    }

    const menuLinks = document.querySelectorAll(
        'nav > ul > li > a ,  nav > ul > li > span'
    )
    for (const menuLink of menuLinks) {
        menuLink.setAttribute('class', 'main-nav__menu-item-link')
    }

    const subMenus = menu.querySelectorAll('span + ul')
    for (const subMenu of subMenus) {
        subMenu.setAttribute('class', 'main-nav__sub-menu')
    }

    const subMenuLis = menu.querySelectorAll('span + ul > li')

    for (const subMenuLi of subMenuLis) {
        subMenuLi.setAttribute('class', 'main-nav__sub-menu-item')
    }
    const subMenuLiLinks = menu.querySelectorAll('span + ul > li > a')

    for (const subMenuLisLink of subMenuLiLinks) {
        subMenuLisLink.setAttribute('class', 'main-nav__sub-menu-item-link')
    }

// -------------------------------------------------------------------------------

// Helper function
    function addListenerToElement (element, eventType, listener) {
        element.addEventListener(eventType, listener)
    }

// Remove active class from menu items, add it on clicked element and toggle show in sub-menus
    function toggleActiveItem (event) {
        let parentItem = event.target.parentElement
        let siblingItem = event.target.nextElementSibling

        for (const value of menuLis) {
            value.classList.remove('main-nav__menu-item--active')
        }
        parentItem.classList.add('main-nav__menu-item--active')

        if (siblingItem) {
            siblingItem.classList.toggle('open')
            dropDownAnimation(event.target)
        }
    }

// Toggle animated menu opening in mobile view, dynamically based on menu items quantity
    function toggleNav (event) {
        const siblingItem = event.target.parentElement.nextElementSibling
        siblingItem.classList.toggle('open')
        dropDownAnimation(event.target.parentElement)
    }

// Animation for dropdowns
    function dropDownAnimation (clicked) {
        let clickedItem = clicked
        let clickedItemSibling = clickedItem.nextElementSibling

        if (clickedItemSibling !== null) {
            let menuItems = clickedItemSibling.children
            let menuItemHeight = menuItems[0].offsetHeight
            let menuItemLength = menuItems.length
            let menuHeight = menuItemHeight * menuItemLength

            const animationParameters = {
                duration: 350,
                easing: 'ease-in-out'
            }
            if (clickedItemSibling.classList.contains('open')) {
                clickedItemSibling.animate(
                    [{ height: '0' }, { height: menuHeight + 'px' }],
                    animationParameters
                )
            } else {
                clickedItemSibling.animate(
                    [{ height: menuHeight + 'px' }, { height: '0' }],
                    animationParameters
                )
            }
        }
    }

// //Close the open submenu  clicking everywhere
    function closeDropdown (event) {
        for (const li of menuLis) {
            let dropDownShow = li.querySelector('.open')

            if (
                dropDownShow !== null &&
                dropDownShow !== event.target.nextElementSibling
            ) {
                dropDownShow.classList.remove('open')
                dropDownAnimation(dropDownShow.previousElementSibling)
            }
        }
    }

    for (const value of menuLinks) {
        addListenerToElement(value, 'click', toggleActiveItem)
    }

    addListenerToElement(toggleButton, 'click', toggleNav)
    addListenerToElement(window, 'mouseup', closeDropdown)


}
