<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/img/svg/rentease_favicon.svg" type="image/x-icon">
    <meta name="description" content="A system which allows user to rent the vehicle from rental provider.">
    <meta name="keywords" content="Rent, Vehicle, RentEase">
    <meta name="author" content="Neer Bahadur Shrestha and Prabhat Gurung">
    <title>Dashboard - RentEase</title>
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/global.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/responsive.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap");

/* 
  Reseting the browser global spacing
*/
*,
*::after,
*::before {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

/* 
  Setting the global css variables
*/
:root {
    --primary-font: Montserrat, sans-serif;
    --transition: all 0.3s ease-in-out;
    --fs-h1: clamp(3rem, 4vw, 5rem);
    --fs-h2: clamp(2.4rem, 4vw, 3rem);
    --fs-h3: clamp(2rem, 4vw, 2.4rem);
    --fs-h4: clamp(1.8rem, 4vw, 2rem);
    --fs-h5: clamp(1.6rem, 4vw, 1.8rem);
    --fs-h6: clamp(1.4rem, 4vw, 1.6rem);
    --fs-text: clamp(1.4rem, 4vw, 1.6rem);
    --color-dark: #1b2021;
    --color-black: #000000;
    --color-light: #ffffff;
    --color-success: #4bb543;
    --color-error: #ff3333;
    --color-warning: #ffc107;
    --color-border: rgba(0, 0, 0, 0.2);
    --default-border-radius: 5px;

    scroll-behavior: smooth;
}

/* 
  Reseting the font size to 62.5% to make defautl font size base 10px
  so we can use 1rem = 10px
*/
html {
    font-size: 62.5%;
}

body {
    font-family: var(--primary-font);
    font-size: var(--fs-text);
    line-height: 1.5;
    font-weight: 400;
    color: var(--color-dark);
}

/* 
  Setting the heading font size and weights
*/

h1,
h2,
h3 {
    font-weight: 700;
}

h4,
h5,
h6 {
    font-weight: 600;
}

h1,
.h1 {
    font-size: var(--fs-h1);
}

h2,
.h2 {
    font-size: var(--fs-h2);
}

h3,
.h3 {
    font-size: var(--fs-h3);
}

h4,
.h4 {
    font-size: var(--fs-h4);
}

h5,
.h5 {
    font-size: var(--fs-h5);
}

h6,
.h6 {
    font-size: var(--fs-h6);
}

ul,
ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

a {
    color: var(--color-text);
    text-decoration: none;
    transition: var(--transition);
    font-weight: 500;
}
a:hover {
    text-decoration: underline;
}

img {
    max-width: 100%;
    height: auto;
}

p {
    margin-bottom: 15px;
}
p:last-of-type {
    margin-bottom: 0;
}

label {
    display: inline-block;
    font-weight: 500;
    margin-bottom: 5px;
}

button {
    font-size: var(--fs-text);
    font-family: var(--primary-font);
    border: none;
    cursor: pointer;
    background-color: transparent;
    border-radius: 0;
    font-weight: 500;
}
svg,
svg * {
    line-height: 1;
}
#page-content {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
#page-content .main-content {
    flex: 1;
}
.screen-reader-text {
    display: none;
}
/* 
 * Components
 */
.btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    -webkit-transition: var(--transition);
    transition: var(--transition);
    font-family: var(--primary-font);
    cursor: pointer;
    border-radius: var(--default-border-radius);
}
.btn:hover {
    text-decoration: none;
}
.btn-dark {
    background-color: var(--color-dark);
    color: var(--color-light);
}
.btn-dark:hover,
.btn-dark:focus {
    background-color: var(--color-black);
}
.btn-outline {
    border: 1px solid var(--color-black);
}
.btn-outline:hover,
.btn-outline:focus {
    background-color: var(--color-black);
    color: var(--color-light);
}

/* Forms */
textarea.form-control {
    height: 150px;
    resize: none;
}
.form-control {
    font-family: var(--primary-font);
    display: block;
    width: 100%;
    border: 1px solid var(--color-border);
    border-radius: var(--default-border-radius);
    padding: 10px 15px;
    font-size: var(--fs-text);
    -webkit-transition: var(--transition);
    transition: var(--transition);
}
.form-control:focus {
    border-color: var(--color-dark);
    outline: none;
}
.form-color {
    height: 40px;
    background-color: var(--color-light);
}

.form-floating {
    position: relative;
}
.form-floating label {
    position: absolute;
    left: 1rem;
    top: 0.8rem;
    transition: var(--transition);
    pointer-events: none;
    padding: 0 5px;
}
.form-floating .form-control::placeholder {
    color: transparent;
}
.form-floating .form-control:focus ~ label,
.form-floating .form-control:not(:placeholder-shown) ~ label {
    top: -1rem;
    left: 1rem;
    transform: scale(0.8);
    transform-origin: left;
    background-color: var(--color-light);
}
.form-field label {
    display: block;
}

.form-file-upload label {
    cursor: pointer;
}
.form-file-upload label {
    display: inline-flex;
    padding: 20px;
    border-radius: var(--default-border-radius);
    border: 2px dashed var(--color-dark);
}
.form-file-upload .form-file::-webkit-file-upload-button {
    visibility: hidden;
    display: none;
}
.form-file-upload .form-file {
    display: block;
    cursor: pointer;
    font-family: var(--primary-font);
}
.form-file-upload .form-file:focus {
    outline: 1px solid transparent;
}
.form-file-upload .form-title {
    display: block;
}
.form-select {
    display: block;
    width: 100%;
    padding: 1rem 1.2rem;
    border-radius: var(--default-border-radius);
    border: 1px solid var(--color-border);
    font-family: var(--primary-font);
    font-weight: 500;
    transition: var(--transition);
}
.form-select:focus {
    outline: 1px solid transparent;
    border-color: var(--color-dark);
}
.form-select option {
    padding: 1rem 1.2rem;
    font-weight: 500;
    line-height: 20px;
}

/* 
 * Utility Classes
 * to use repeatedly
 */
.h-100 {
    height: 100%;
}
/* grid */
.grid {
    display: grid;
    grid-gap: var(--gap);
}
.column-2 {
    grid-template-columns: repeat(2, 1fr);
}
.column-3 {
    grid-template-columns: repeat(3, 1fr);
}
.column-5 {
    grid-template-columns: repeat(5, 1fr);
}

/* 
 * Columns which is used as child of flex
 */

[class*="col-"] {
    width: 100%;
    padding: 0 1rem;
}

.col-1 {
    width: 8.3333333333%;
}

.col-2 {
    width: 16.6666666667%;
}

.col-3 {
    width: 25%;
}

.col-4 {
    width: 33.3333333333%;
}

.col-5 {
    width: 41.6666666667%;
}

.col-6 {
    width: 50%;
}

.col-7 {
    width: 58.3333333333%;
}

.col-8 {
    width: 66.6666666667%;
}

.col-9 {
    width: 75%;
}

.col-10 {
    width: 83.3333333333%;
}

.col-11 {
    width: 91.6666666667%;
}

@media (min-width: 576px) {
    .col-sm-1 {
        width: 8.3333333333%;
    }
    .col-sm-2 {
        width: 16.6666666667%;
    }
    .col-sm-3 {
        width: 25%;
    }
    .col-sm-4 {
        width: 33.3333333333%;
    }
    .col-sm-5 {
        width: 41.6666666667%;
    }
    .col-sm-6 {
        width: 50%;
    }
    .col-sm-7 {
        width: 58.3333333333%;
    }
    .col-sm-8 {
        width: 66.6666666667%;
    }
    .col-sm-9 {
        width: 75%;
    }
    .col-sm-10 {
        width: 83.3333333333%;
    }
    .col-sm-11 {
        width: 91.6666666667%;
    }
}
@media (min-width: 768px) {
    .col-md-1 {
        width: 8.3333333333%;
    }
    .col-md-2 {
        width: 16.6666666667%;
    }
    .col-md-3 {
        width: 25%;
    }
    .col-md-4 {
        width: 33.3333333333%;
    }
    .col-md-5 {
        width: 41.6666666667%;
    }
    .col-md-6 {
        width: 50%;
    }
    .col-md-7 {
        width: 58.3333333333%;
    }
    .col-md-8 {
        width: 66.6666666667%;
    }
    .col-md-9 {
        width: 75%;
    }
    .col-md-10 {
        width: 83.3333333333%;
    }
    .col-md-11 {
        width: 91.6666666667%;
    }
}
@media (min-width: 992px) {
    .col-lg-1 {
        width: 8.3333333333%;
    }
    .col-lg-2 {
        width: 16.6666666667%;
    }
    .col-lg-3 {
        width: 25%;
    }
    .col-lg-4 {
        width: 33.3333333333%;
    }
    .col-lg-5 {
        width: 41.6666666667%;
    }
    .col-lg-6 {
        width: 50%;
    }
    .col-lg-7 {
        width: 58.3333333333%;
    }
    .col-lg-8 {
        width: 66.6666666667%;
    }
    .col-lg-9 {
        width: 75%;
    }
    .col-lg-10 {
        width: 83.3333333333%;
    }
    .col-lg-11 {
        width: 91.6666666667%;
    }
}
@media (min-width: 1200px) {
    .col-xl-1 {
        width: 8.3333333333%;
    }
    .col-xl-2 {
        width: 16.6666666667%;
    }
    .col-xl-3 {
        width: 25%;
    }
    .col-xl-4 {
        width: 33.3333333333%;
    }
    .col-xl-5 {
        width: 41.6666666667%;
    }
    .col-xl-6 {
        width: 50%;
    }
    .col-xl-7 {
        width: 58.3333333333%;
    }
    .col-xl-8 {
        width: 66.6666666667%;
    }
    .col-xl-9 {
        width: 75%;
    }
    .col-xl-10 {
        width: 83.3333333333%;
    }
    .col-xl-11 {
        width: 91.6666666667%;
    }
}
@media (min-width: 1400px) {
    .col-xxl-1 {
        width: 8.3333333333%;
    }
    .col-xxl-2 {
        width: 16.6666666667%;
    }
    .col-xxl-3 {
        width: 25%;
    }
    .col-xxl-4 {
        width: 33.3333333333%;
    }
    .col-xxl-5 {
        width: 41.6666666667%;
    }
    .col-xxl-6 {
        width: 50%;
    }
    .col-xxl-7 {
        width: 58.3333333333%;
    }
    .col-xxl-8 {
        width: 66.6666666667%;
    }
    .col-xxl-9 {
        width: 75%;
    }
    .col-xxl-10 {
        width: 83.3333333333%;
    }
    .col-xxl-11 {
        width: 91.6666666667%;
    }
}
.container {
    padding: 0 1.5rem;
    margin: 0 auto;
}

@media (min-width: 576px) {
    .container {
        max-width: 576px;
    }
}
@media (min-width: 768px) {
    .container {
        max-width: 768px;
    }
}
@media (min-width: 992px) {
    .container {
        max-width: 992px;
    }
}
@media (min-width: 1200px) {
    .container {
        max-width: 1200px;
    }
}
@media (min-width: 1400px) {
    .container {
        max-width: 1400px;
    }
}
.gap-1 {
    --gap: 1rem;
}
.gap-2 {
    --gap: 2rem;
}
.gap-3 {
    --gap: 3rem;
}

.p-1 {
    padding: 1rem;
}

.py-1 {
    padding: 1rem 0;
}

.px-1 {
    padding: 0 1rem;
}

.ps-1 {
    padding-left: 1rem;
}

.pe-1 {
    padding-right: 1rem;
}

.pb-1 {
    padding-bottom: 1rem;
}

.pt-1 {
    padding-top: 1rem;
}

.m-1 {
    margin: 1rem;
}

.my-1 {
    margin: 1rem 0;
}

.mx-1 {
    margin: 0 1rem;
}

.ms-1 {
    margin-left: 1rem;
}

.me-1 {
    margin-right: 1rem;
}

.mb-1 {
    margin-bottom: 1rem;
}

.mt-1 {
    margin-top: 1rem;
}

.gap-2 {
    --gap: 2rem;
}

.p-2 {
    padding: 2rem;
}

.py-2 {
    padding: 2rem 0;
}

.px-2 {
    padding: 0 2rem;
}

.ps-2 {
    padding-left: 2rem;
}

.pe-2 {
    padding-right: 2rem;
}

.pb-2 {
    padding-bottom: 2rem;
}

.pt-2 {
    padding-top: 2rem;
}

.m-2 {
    margin: 2rem;
}

.my-2 {
    margin: 2rem 0;
}

.mx-2 {
    margin: 0 2rem;
}

.ms-2 {
    margin-left: 2rem;
}

.me-2 {
    margin-right: 2rem;
}

.mb-2 {
    margin-bottom: 2rem;
}

.mt-2 {
    margin-top: 2rem;
}

.gap-3 {
    --gap: 3rem;
}

.p-3 {
    padding: 3rem;
}

.py-3 {
    padding: 3rem 0;
}

.px-3 {
    padding: 0 3rem;
}

.ps-3 {
    padding-left: 3rem;
}

.pe-3 {
    padding-right: 3rem;
}

.pb-3 {
    padding-bottom: 3rem;
}

.pt-3 {
    padding-top: 3rem;
}

.m-3 {
    margin: 3rem;
}

.my-3 {
    margin: 3rem 0;
}

.mx-3 {
    margin: 0 3rem;
}

.ms-3 {
    margin-left: 3rem;
}

.me-3 {
    margin-right: 3rem;
}

.mb-3 {
    margin-bottom: 3rem;
}

.mt-3 {
    margin-top: 3rem;
}

.gap-4 {
    --gap: 4rem;
}

.p-4 {
    padding: 4rem;
}

.py-4 {
    padding: 4rem 0;
}

.px-4 {
    padding: 0 4rem;
}

.ps-4 {
    padding-left: 4rem;
}

.pe-4 {
    padding-right: 4rem;
}

.pb-4 {
    padding-bottom: 4rem;
}

.pt-4 {
    padding-top: 4rem;
}

.m-4 {
    margin: 4rem;
}

.my-4 {
    margin: 4rem 0;
}

.mx-4 {
    margin: 0 4rem;
}

.ms-4 {
    margin-left: 4rem;
}

.me-4 {
    margin-right: 4rem;
}

.mb-4 {
    margin-bottom: 4rem;
}

.mt-4 {
    margin-top: 4rem;
}

.gap-5 {
    --gap: 5rem;
}

.p-5 {
    padding: 5rem;
}

.py-5 {
    padding: 5rem 0;
}

.px-5 {
    padding: 0 5rem;
}

.ps-5 {
    padding-left: 5rem;
}

.pe-5 {
    padding-right: 5rem;
}

.pb-5 {
    padding-bottom: 5rem;
}

.pt-5 {
    padding-top: 5rem;
}

.m-5 {
    margin: 5rem;
}

.my-5 {
    margin: 5rem 0;
}

.mx-5 {
    margin: 0 5rem;
}

.ms-5 {
    margin-left: 5rem;
}

.me-5 {
    margin-right: 5rem;
}

.mb-5 {
    margin-bottom: 5rem;
}

.mt-5 {
    margin-top: 5rem;
}

@media (min-width: 768px) {
    .gap-md-2 {
        --gap: 2rem;
    }
}

.flex {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    /* flex-wrap: wrap; */
    gap: var(--gap);
}

.flex-1 {
    flex: 1;
}

.flex-wrap {
    flex-wrap: wrap;
}
.block {
    display: block;
}

.align-items-center {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.justify-content-center {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}

.justify-content-between {
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.text-center {
    text-align: center;
}

.fw-black {
    font-weight: 900;
}

.fw-bold {
    font-weight: 700;
}

.bg-dark {
    background-color: var(--color-dark);
}

.text-dark {
    color: var(--color-dark);
}

.bg-black {
    background-color: var(--color-black);
}

.text-black {
    color: var(--color-black);
}

.bg-light {
    background-color: var(--color-light);
}

.text-light {
    color: var(--color-light);
}

.bg-success {
    background-color: var(--color-success);
}

.text-success {
    color: var(--color-succes);
}

.bg-error {
    background-color: var(--color-error);
}

.text-error {
    color: var(--color-error);
}

.bg-warning {
    background-color: var(--color-warning);
}

.text-warning {
    color: var(--color-warnin);
}

/* Dropdown Menu Css */
.has-dropdown {
    cursor: pointer;
    position: relative;
    padding: 5px 0;
}
.has-dropdown .dropdown-menu {
    opacity: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    right: 20px;
    padding: 10px 10px;
    box-shadow: 0 0 30px rgba(0 0 0 / 10%);
    border-radius: var(--default-border-radius);
    min-width: 150px;
    transition: var(--transition);
    background-color: var(--color-light);
}
.has-dropdown:hover .dropdown-menu {
    right: 0;
    opacity: 1;
    pointer-events: all;
}
.has-dropdown .dropdown-menu a {
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: var(--default-border-radius);
}
.has-dropdown .dropdown-menu a:hover {
    background-color: rgba(0, 0, 0, 0.1);
}
/* End Dropdown Menu */

/* Toggling Dropdown
 * Class Needed:
 * 1. dropdown-container
 * 2. btn-dropdown
 * 3. dropdown-content
 */

.dropdown-container {
    position: relative;
    padding: 0 5px;
}

.dropdown-container .dropdown-content {
    min-width: 300px;
    position: absolute;
    right: 20px;
    top: 100%;
    transition: var(--transition);
    padding: 10px;
    box-shadow: 0 0 30px rgba(0 0 0 / 10%);
    background-color: var(--color-light);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}
.dropdown-container .dropdown-content a {
    padding: 10px;
    display: block;
    border-radius: var(--default-border-radius);
}
.dropdown-container .dropdown-content a:hover {
    text-decoration: none;
    background-color: rgba(0 0 0 / 10%);
}
.dropdown-container .dropdown-content.show {
    pointer-events: all;
    visibility: visible;
    opacity: 1;
    right: 0;
}

/* 
 * Modal
 */
.btn-close {
    color: var(--color-dark);
}
.btn-close .line {
    display: inline-block;
    position: relative;
}
.btn-close .line::after,
.btn-close .line::before {
    content: "";
    width: 2rem;
    height: 0.2rem;
    border-radius: var(--default-border-radius);
    display: block;
    background-color: currentColor;
}
.btn-close .line::after {
    transform: rotate(45deg) translateY(-3px) translateX(-1px);
}
.btn-close .line::before {
    transform: rotate(-45deg) translateX(1px);
}
.modal-container .modal-content {
    pointer-events: none;
    visibility: hidden;
    opacity: 0;
    position: fixed;
    inset: 0;
    background-color: rgba(0 0 0 / 50%);
    z-index: 999;
    transition: var(--transition);
}
.modal-container .modal-content.show {
    pointer-events: all;
    visibility: visible;
    opacity: 1;
}
.modal-container .modal-dialog {
    padding: 2rem;
    border-radius: var(--default-border-radius);
    transform: translateX(-20px);
    transition: var(--transition);
    max-height: 90vh;
    overflow-y: scroll;
    overflow-x: hidden;
}
.modal-container .modal-content.show .modal-dialog {
    transform: translateX(0);
}

/* 
 * Tabs
 */
.tab-list {
    display: flex;
}
.tab-list .tab-button {
    padding: 0 1.5rem 1rem;
}
.tab-list .tab-button.active {
    border-bottom: 2px solid;
}
.tab-content .tab-pane {
    display: none;
    padding: 1.5rem 0 0;
}
.tab-content .tab-pane.active {
    display: block;
    animation: fade 0.7s ease forwards;
}

@keyframes fade {
    from {
        opacity: 0;
        visibility: hidden;
    }
    to {
        opacity: 1;
        visibility: visible;
    }
}
/* 
 * End of Utilities classes
 */
/* For the devices wihich screen size is less then 1400px */
@media (max-width: 1399.98px) {
}

/* For the devices wihich screen size is less then 1200px */
@media (max-width: 1199.98px) {
    .site-header .user-info .user-name {
        display: none;
    }
    .main-navigation,
    .main-navigation .menu {
        gap: 15px;
    }
    .site-header .container > * {
        gap: 20px;
    }
    .card .card-features a {
        padding: 0.5rem;
    }
    .card .card-features svg {
        max-width: 1.4rem;
    }
    /* Profile Responsive */
    .user-profile-container {
        flex-direction: column;
    }
    .user-profile-container .user-info-section {
        flex-direction: unset;
        gap: 50px;
    }
    .user-profile-container .user-info-container {
        width: 100%;
    }
    .user-info-container .user-image-section > img {
        transform: translateY(-20px);
    }
    .user-info-container .user-info-section{
        margin-bottom: unset;
    }
    .user-info-container .review-user{
        margin-bottom: 2em;
    }
    .user-profile-container .user-activity-section {
        border-left: unset;
    }
    .user-activity-section {
        width: auto;
    }
}
/* For the devices wihich screen size is less then 992px */
@media (max-width: 991.98px) {
    .site-brand img {
        display: block;
        max-width: 50px;
    }
    .site-brand .site-title-wrapper {
        display: none;
    }
    .trending .grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem 2rem;
    }
    .main-navigation .menu {
        display: none;
    }
    .card-linear .card-img {
        align-self: flex-start;
    }
    .card-linear .card-img img {
        max-width: 280px;
        aspect-ratio: 280 / 180;
        object-fit: cover;
    }
    .card-linear .card-body {
        padding: 0 0 0 20px;
    }
    .card-linear .card-title,
    .card-linear .product-description {
        margin-bottom: 1rem;
    }
    .card-linear .price-and-availability {
        margin-bottom: 1.5rem;
    }
    .chat-item .chat-info {
        display: none;
    }
    .chat-container .chat-header .chat-item .chat-info {
        display: flex;
    }
    .chat-item img {
        max-width: 100%;
    }
    .chat-container .chat-header .chat-item img {
        max-width: 4rem;
    }
    .conv-item .conv-message {
        max-width: 75%;
    }
}
/* For the devices wihich screen size is less then 768px */
@media (max-width: 767.98px) {
    .site-header {
        padding: 1rem 0;
    }
    .main-navigation {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 0.8rem 2.5rem;
        justify-content: space-between;
        background-color: var(--color-light);
    }
    .main-navigation .dropdown-container .dropdown-content,
    .main-navigation .has-dropdown .dropdown-menu {
        bottom: 100%;
        top: unset;
    }
    .post-form .form-group.column-2 {
        grid-template-columns: 1fr;
    }
    .site-header .post-form {
        display: flex;
        flex-direction: column;
    }

    .trending .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    /* card linear */
    .card-linear {
        flex-direction: column;
    }
    .card-linear .card-img {
        width: 100%;
    }
    .card-linear .card-img img {
        max-width: 100%;
        width: 100%;
    }
    .card-linear .card-body {
        padding: 2rem 0 0;
    }

    .card-linear .location-and-time {
        flex-wrap: wrap;
    }
    .user-profile .container {
        margin: 0 auto;
    }
    .user-activity-section .user-save-list .grid,
    .user-activity-section .user-ad-posts .grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .admin-menu-list a {
        justify-content: center;
    }
    .admin-menu-list .list-text {
        display: none;
    }
    .admin-menu-list .sub-menu {
        padding-left: 0;
    }
    .admin-menu-list .list-icon {
        width: 2rem;
    }
}
/* For the devices wihich screen size is less then 576px */
@media (max-width: 575.98px) {
    .trending .grid,
    .about-us .grid {
        grid-template-columns: 1fr;
    }
    .chat-user-list li .chat-link {
        padding: 0.5rem 0;
    }
    .chat-user-list li .chat-link:hover {
        background-color: transparent;
    }
    .user-profile .container {
        margin: 0 auto;
    }
    .user-activity-section .user-save-list .grid,
    .user-activity-section .user-ad-posts .grid {
        grid-template-columns: repeat(1, 1fr);
    }
}
/* 
 * Header
 */
.site-header {
    background-color: var(--color-light);
    padding: 20px 0;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
    position: sticky;
    top: 0;
    z-index: 999;
}
.site-brand {
    display: inline-block;
    font-size: var(--fs-h2);
}
.site-brand img {
    display: none;
}
.menu-toggler {
    display: none;
    padding: 4px;
    border-radius: var(--default-border-radius);
    border: 2px solid var(--color-black);
    transition: var(--transition);
}
.menu-toggler:hover {
    color: var(--color-light);
    background-color: var(--color-black);
}
.menu-toggler span {
    display: block;
    width: 25px;
    height: 2px;
    background-color: currentColor;
    margin: 6px;
}

.main-navigation .menu {
    display: flex;
    gap: 30px;
}
.main-navigation {
    display: flex;
    align-items: center;
    gap: 30px;
}
.main-navigation .btn-menu-close {
    display: none;
}

.user-info {
    display: flex;
    gap: 10px;
    align-items: center;
    cursor: pointer;
}
.user-info .user-image {
    max-width: 40px;
    border-radius: 50%;
    aspect-ratio: 1 / 1;
}

.user-info .user-detail {
    display: flex;
    flex-direction: column;
}

.user-info-section {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: start;
}
.user-info-section .user-image-section {
    max-width: 150px;
    border-radius: 50%;
}
.user-info-section .user-detail-section {
    display: flex;
    flex-direction: column;
    gap: 1em;
    align-items: flex-start;
    justify-content: center;
}
.user-info-container .user-info-section{
    margin-bottom: 1em;
}
.user-info-container .rating-wrapper{
    display: flex;
    gap: 1.5em;
    margin-bottom: 1em;
}
.divider {
    border-left: 1px solid var(--color-border);
}
/*
* Search Result Section
*/
.search-result .search-title {
    border-bottom: 1px solid var(--color-border);
}
.result-list .card-linear {
    margin-top: 30px;
}

/* Notifications styles */
.notifications .notifications-menu {
    min-width: 300px;
}
.notifications .notification-icon {
    display: grid;
}

/* Search Bar Styles */
.search-bar {
    flex: 1;
    position: relative;
}
.search-bar [type="submit"] {
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    height: 100%;
}
.search-bar svg {
    max-width: 1.6rem;
}
.search-bar .form-field {
    display: flex;
}
.search-bar .form-control {
    padding-right: 3.5rem;
}
.search-bar .screen-reader-text {
    display: none;
}

/* Home page styling */
.categories .category-title {
    margin-bottom: 20px;
}
.categories-list {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.categories-list a {
    display: block;
    padding: 10px 15px;
    border: 1px solid var(--color-dark);
    border-radius: var(--default-border-radius);
}
.categories-list a:hover {
    text-decoration: none;
    background-color: var(--color-dark);
    color: var(--color-light);
}

/* 
 * Card styles
 */
.card-linear {
    display: flex;
    flex-direction: row;
    position: relative;
    overflow: hidden;
}
.card {
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
}
.card .card-img {
    border-radius: var(--default-border-radius);
    overflow: hidden;
}
.card .card-img img {
    aspect-ratio: 400 / 250;
    object-fit: cover;
}
.card .card-img img,
.card-linear .card-img img {
    transition: var(--transition);
    width: 100%;
}
.card .card-features {
    display: flex;
    flex-direction: column;
    gap: 10px;
    position: absolute;
    top: 20px;
    right: -50px;
    transition: var(--transition);
}
.card .card-features svg,
.card .card-features img,
.card-linear .card-features svg,
.card-linear .card-features img {
    max-width: 16px;
    height: auto;
}
.card .card-features a,
.card-linear .card-features a {
    display: flex;
    padding: 10px;
    border-radius: var(--default-border-radius);
    background-color: rgba(0, 0, 0, 0.1);
}
.card-linear .card-features a {
    background-color: transparent;
}
.card .card-features a:hover,
.card-linear .card-features a:hover {
    background-color: rgba(0, 0, 0, 0.2);
}
.card .card-img > a {
    display: grid;
}
.card .card-img a:hover img,
.card .card-img a:focus img,
.card-linear .card-img a:hover img {
    transform: scale(1.2);
}
.card:hover .card-features {
    right: 20px;
}
.card .card-title a,
.card .price,
.card-linear .card-title a,
.card-linear .price {
    font-weight: 700;
}
.card-body .card-detail{
    display: flex;
    justify-content: space-between;
}
.card-detail .dropdown-menu{
    cursor: pointer;
}
.card-linear .card-img {
    overflow: hidden;
}
.card-linear .card-img a,
.card-linear .card-img img {
    display: block;
}
.team-card .card-img img {
    aspect-ratio: 750 / 950;
}
/* 
 * Site footer
 */
.site-footer {
    background-color: var(--color-black);
    color: var(--color-light);
}
.site-footer .site-brand {
    margin-bottom: 20px;
}
.copyright {
    border-top: 1px solid rgba(255, 255, 255, 0.5);
}

/* 
 * Single Page
 */
.post-detail .post-title {
    margin-bottom: 2rem;
}
.post-gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    position: sticky;
    top: 11rem;
}
.post-gallery > *:first-child {
    grid-column: span 3;
}
.post-gallery img {
    aspect-ratio: 400 / 250;
    inline-size: 100%;
    object-fit: cover;
    border-radius: var(--default-border-radius);
}
.detail-list {
    list-style: none;
}
.detail-list li {
    display: flex;
}
.detail-list .detail-title {
    min-width: 200px;
    font-weight: 600;
}
.detail-list .detail-info {
    font-weight: 500;
}
.detail-list li {
    padding: 0 1rem;
}
.detail-list li:not(:last-child) {
    padding-bottom: 1rem;
    margin-bottom: 1rem;
    border-bottom: 1px solid var(--color-border);
}

/* 
 * comments
 */
.comment-list {
    margin-bottom: 2rem;
}
.comment-list li {
    display: grid;
    gap: 1rem;
}
.comment-list .sub-comment-list {
    margin-left: 4rem;
}
.comment-container {
    padding: 2rem;
    border-radius: var(--default-border-radius);
    background-color: rgba(0, 0, 0, 0.03);
}
.comment-meta {
    display: flex;
    gap: 1.5rem;
}

/* 
 * Comment form
 */
.comment-form {
    display: flex;
    gap: 1rem;
}
.comment-form .user-image {
    max-width: 40px;
    align-self: flex-start;
    flex-shrink: 1;
}
.comment-form button[type="submit"] {
    margin-top: 1rem;
}
.replying-to {
    border-radius: var(--default-border-radius);
    border: 1px solid var(--color-border);
    padding: 0.5rem 1.5rem;
    margin-bottom: 0.5rem;
    background: var(--color-dark);
    color: var(--color-light);
    display: none;
}
.replying-to.active {
    display: inline-block;
}
.replying-to .btn-close {
    margin-left: 0.5rem;
    display: inline-block;
    color: var(--color-light);
}
.location-list li {
    display: flex;
    gap: 1.5rem;
    align-items: center;
}
.location-list .location-icon {
    max-width: 30px;
}
.user-profile{
    height: 100vh;
}
.user-detail-section .location-icon {
    max-width: 20px;
}
.user-activities .tab-list {
    justify-content: space-around;
}

/* 
 * Review Tab Section Start
*/
.user-meta img {
    max-width: 40px;
}
.rating{
    display: inline-block;
    overflow: hidden;
    position: relative;
}
.review-items .review-response {
    font-size: 18px;
}
.rating .star-filled {
    position: absolute;
    overflow: hidden;
}
.rating > div {
    display: flex;
}
.rating div > * {
    flex-shrink: 0;
}
.review-card {
    max-width: 80%;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--color-border);
}
/* 
 * Review Tab Section End
*/

/* 
 * Chat Page
*/
.chat-user-list {
    display: flex;
    flex-flow: column;
}
.chat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    border-radius: var(--default-border-radius);
}
.chat-item .user-avatar {
    display: flex;
    position: relative;
}
.chat-item img {
    max-width: 5rem;
    border-radius: 50%;
    aspect-ratio: 1 / 1;
    object-fit: cover;
}
.chat-item .user-avatar .status {
    position: absolute;
    width: 1rem;
    height: 1rem;
    bottom: 5px;
    right: 5px;
    background-color: var(--color-warning);
    border-radius: 50%;
    border: 1px solid var(--color-black);
}
.chat-item .user-avatar .status.active {
    background-color: var(--color-success);
}
.chat-item .chat-info {
    display: flex;
    flex-flow: column;
}
.chat-item .chat-last-msg {
    font-weight: 400;
    font-size: 1.4rem;
}
.chat-item .user-name {
    font-weight: 500;
}
.chat-user-list li .chat-link {
    padding: 1rem;
}
.chat-user-list li .chat-link:hover {
    text-decoration: none;
    background-color: rgba(0 0 0 / 5%);
}

/* chat container */
.chat-container {
    display: flex;
    flex-direction: column;
}
.chat-container .chat-header {
    padding: 1.4rem 2rem;
    box-shadow: 0 10px 15px rgba(0 0 0 / 5%);
    border-radius: var(--default-border-radius);
}
.chat-container .chat-body {
    height: 50rem;
    overflow-y: scroll;
    padding: 3rem 2rem 0;
}

.chat-conversation {
    display: flex;
    flex-flow: column;
    gap: 1.4rem;
}
.conv-item {
    display: flex;
    gap: 1rem;
}
.conv-item .user-avatar img {
    max-width: 40px;
    border-radius: 50%;
    aspect-ratio: 1 / 1;
    object-fit: cover;
}
.conv-item .conv-message {
    padding: 1rem;
    background-color: rgba(0 0 0 / 5%);
    border-radius: var(--default-border-radius);
    max-width: 60%;
}
.conv-item.my-side {
    justify-content: flex-end;
}

.chat-container .chat-footer {
    padding: 3rem 2rem 1rem;
}

.chat-form {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
}
.chat-form textarea.form-control {
    height: 80px;
}
/* admin */
.admin-header {
    padding: 1rem 2rem;
}
.dashboard {
    display: flex;
    flex-flow: column;
}
.dashboard > * {
    flex: 1;
}
.admin-sidebar {
    color: var(--color-light);
}
.admin-menu-list .sub-menu {
    margin-top: 1rem;
    padding-left: 1.5rem;
}
.admin-menu-list .sub-menu li:not(:last-child) {
    margin-bottom: 1rem;
}
.admin-menu-list .list-icon {
    width: 1.8rem;
    filter: invert(1);
    display: flex;
}
.admin-menu-list a {
    display: flex;
    align-items: center;
    gap: 1.2rem;
}
.admin-menu-list .list-icon svg {
    width: inherit;
    height: auto;
}
.posts-list {
    display: flex;
    flex-flow: column;
    gap: 1rem;
}
.posts-list li {
    padding: 1.5rem;
    border-radius: var(--default-border-radius);
    border: 1px solid rgba(0 0 0 / 15%);
}
.posts-list .form-select {
    display: inline-block;
    width: unset;
    padding: 0.5rem 1rem;
}
.posts-list .btn-submit {
    padding: 0.5rem 1rem;
    font-size: 1.4rem;
}
.user-review-form .star-filled {
    pointer-events: none;
    transition: var(--transition);
}

    </style>
</head>

<body>
    <div id="page-content">
        <header class="site-header admin-header">
            <div class="flex gap-2 justify-content-between">
                <a href="<?php echo get_root_directory_uri(); ?>" class="site-brand">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/svg/rentease_favicon.svg" alt="">
                    <div class="site-title-wrapper">
                        Rent<span class="fw-bold">Ease</span>
                    </div>
                </a>

                <div class="has-dropdown user-avatar">
                    <div class="user-info">
                        <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                        <span class="user-name">User</span>
                    </div>

                    <ul class="dropdown-menu">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="main-content dashboard">
            <div class="flex flex-wrap">
                <aside class="col-2 col-md-3 bg-dark">
                    <div class="admin-sidebar py-3">
                        <ul class="admin-menu-list">
                            <li>
                                <a href="<?php echo get_root_directory_uri(); ?>/admin" title="Posts">
                                    <span class="list-icon">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M499.99 176h-59.87l-16.64-41.6C406.38 91.63 365.57 64 319.5 64h-127c-46.06 0-86.88 27.63-103.99 70.4L71.87 176H12.01C4.2 176-1.53 183.34.37 190.91l6 24C7.7 220.25 12.5 224 18.01 224h20.07C24.65 235.73 16 252.78 16 272v48c0 16.12 6.16 30.67 16 41.93V416c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-54.07c9.84-11.25 16-25.8 16-41.93v-48c0-19.22-8.65-36.27-22.07-48H494c5.51 0 10.31-3.75 11.64-9.09l6-24c1.89-7.57-3.84-14.91-11.65-14.91zm-352.06-17.83c7.29-18.22 24.94-30.17 44.57-30.17h127c19.63 0 37.28 11.95 44.57 30.17L384 208H128l19.93-49.83zM96 319.8c-19.2 0-32-12.76-32-31.9S76.8 256 96 256s48 28.71 48 47.85-28.8 15.95-48 15.95zm320 0c-19.2 0-48 3.19-48-15.95S396.8 256 416 256s32 12.76 32 31.9-12.8 31.9-32 31.9z" />
                                        </svg>
                                    </span>
                                    <span class="list-text">
                                        Posts
                                    </span>
                                </a>

                                <ul class="sub-menu">
                                    <li>
                                        <a href="?status=<?php echo urlencode('pending'); ?>" title="Pending">
                                            <span class="list-icon">
                                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd" d="M1 7C1 3.68629 3.68629 1 7 1H17C20.3137 1 23 3.68629 23 7V17C23 20.3137 20.3137 23 17 23H7C3.68629 23 1 20.3137 1 17V7ZM11 5V12C11 12.5523 11.4477 13 12 13H19V11H13V5H11Z" fill="black" fill-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="list-text">
                                                Pending
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?status=<?php echo urlencode('published'); ?>" title="Published">
                                            <span class="list-icon">
                                                <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg">
                                                    <defs>
                                                        <style>
                                                            .cls-1 {
                                                                fill: none;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <title />
                                                    <path d="M26,4H6A2,2,0,0,0,4,6V26a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V6A2,2,0,0,0,26,4ZM14,21.5,9,16.5427,10.5908,15,14,18.3456,21.4087,11l1.5918,1.5772Z" transform="translate(0 0)" />
                                                    <path class="cls-1" d="M14,21.5,9,16.5427,10.5908,15,14,18.3456,21.4087,11l1.5918,1.5772Z" id="inner-path" transform="translate(0 0)" />
                                                    <rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32" />
                                                </svg>
                                            </span>
                                            <span class="list-text">
                                                Published
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <aside class="col-10 col-md-9">
                    <section class="py-3">
                        <h1 class="h3 mb-2">Posts</h1>

                        <ul class="posts-list">
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </li>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>
        </main>
    </div>
</body>

</html>