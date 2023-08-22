import { expect, test } from "@playwright/test";

import { login } from "./helpers/login";
import { v4 as uuidv4 } from "uuid";

const NORMALUSER = "test@example.org";
const NORMALPASSWORD = "password";

const ADMINUSER = "admin@example.org";
const ADMINPASSWORD = "password";

test("can Login", async ({ page }) => {
    await login(page, expect, NORMALUSER, NORMALPASSWORD);
});

test("can Filter Rooms", async ({ page }) => {
    //  login
    await login(page, expect, NORMALUSER, NORMALPASSWORD);

    //  filter rooms, use query params
    await page.goto(
        "https://project.test/?min_price=0&max_price=50688&states%5B%5D=1"
    );

    const button = await page.waitForSelector(
        ".btn.btn-default.btn-squared.color-light.btn-outline-light.ms-lg-0.ms-0.me-2.mb-lg-10"
    );

    // Click the button
    await button.click();
});

test("can View Room", async ({ page }) => {
    //  login
    await login(page, expect, NORMALUSER, NORMALPASSWORD);

    //  view room
    await page.goto("https://project.test/rooms/1");

    //  expect to see room details
    page.waitForSelector("h6.modal-title");
    const title = await page.$eval("h6.modal-title", (el) => el.textContent);
    expect(title).toBe("Book this Room");
});

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
