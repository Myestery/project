import { expect, test } from "@playwright/test";

import { login } from "./helpers/login";
import { v4 as uuidv4 } from "uuid";

const NORMALUSER = "test@example.org";
const NORMALPASSWORD = "password";

const ADMINUSER = "admin@example.org";
const ADMINPASSWORD = "password";

test("can Login Admin", async ({ page }) => {
    await login(page, expect, ADMINUSER, ADMINPASSWORD);
});

test("can Create Room", async ({ page }) => {
    //  login
    await login(page, expect, ADMINUSER, ADMINPASSWORD);

    //  create room
    // look for 'View Rooms' link
    await page.goto("https://project.test/admin/rooms");

    // wait for page to go to /admin/rooms
    await expect(page).toHaveURL("https://project.test/admin/rooms");

    await page.waitForSelector('a[href="#"]');
    //  cleck that link
    await page.click('a.btn.px-15.btn-primary');

    // wait for modal to show
    await page.waitForSelector("input[name=number]");

    // fill all inputs
    await page.fill("input[name=number]", `R-${uuidv4()}`);
    await page.fill("input[name=capacity]", '2');
    // select single from select input
    await page.selectOption("select[name=type]", "Single");
    // description
    await page.fill("input[name=description]", "This is a test room");
    // price
    await page.fill("input[name=price]", "10000");

    // click submit button
    await page.click('button[type="submit"]');

    // confirm page reloaded
    await expect(page).toHaveURL("https://project.test/admin/rooms");
});

test("can Add Staff", async ({ page }) => {
    //  login
    await login(page, expect, ADMINUSER, ADMINPASSWORD);

    //  add staff
    // look for 'View Staff' link
    await page.goto("https://project.test/admins/create");

    // wait for page to go to /admin/staff
    await expect(page).toHaveURL("https://project.test/admins/create");
    // wait for modal to show
    await page.waitForSelector("input[name=name]");

    // fill all inputs
    await page.fill("input[name=name]", `Staff-${uuidv4()}`);
    await page.fill("input[name=email]", `staff-${uuidv4()}@example.org`);
    await page.fill("input[name=password]", "password");

    // role in select dropdown, choose staff
    await page.selectOption("select[name=role]", "staff");
    // click submit button
    await page.click('button[type="submit"]');

    // confirm page reloaded
    await expect(page).toHaveURL("https://project.test/admins");
});