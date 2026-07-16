# ✦ One-Word-from-Your-Universe

A space-themed interactive webpage where visitors can enter one word that represents their personal universe.

The submitted words are stored in a MySQL database and displayed dynamically on the page.

---

## 🌐 Visit the Website

[🚀 Visit using InfinityFree](https://my-little-universe.page.gd/one-word.html)

[🟥 I added a file called "ملاحظات تفصيلية لنفسي (مشروع2)," where I wrote personal notes for myself in colloquial Arabic, in case you would like to read it.](ملاحظات%20تفصيلية%20لنفسي%20%28مشروع2%29.pdf)

---

## 📸 Website Preview

### Enter Your Word Section
<img width="1259" height="712" alt="Enter Your Word Section" src="https://github.com/user-attachments/assets/f77a3ff3-ba91-4dca-bbd2-27bbf7e54567" />

### Displayed Words Section
<img width="1253" height="557" alt="Displayed Words Section" src="https://github.com/user-attachments/assets/78d9e7a0-1161-453e-abfd-94626a40ba30" />

---

## 💫 About the Project

**One Word from Your Universe** is an interactive webpage that asks visitors to enter one word that represents their personality, feelings, dreams, or personal world.

Each submitted word is stored in a MySQL database and displayed as a floating word capsule inside the website.

The page follows the same space-inspired visual style as **My Little Universe**, using stars, glowing objects, moving planets, glass-style cards, and animations.

---

## 🪐 Website Sections

- **Enter Your Word Section** — Contains an HTML form that allows visitors to submit one word only. The input is validated using HTML attributes, then the submitted word is sent to a PHP file and stored in a MySQL database with a default visible status.

- **Displayed Words Section** — Retrieves the visible words from the database using PHP and the JavaScript Fetch API. The words are inserted dynamically into the page without reloading it, and the eye button sends a POST request to change their visibility status between visible and hidden.

---

## 🛠️ Technologies Used

- HTML
- CSS
- JavaScript
- Fetch API
- PHP
- MySQL
- Google Fonts
- InfinityFree

No external framework was used.

---

## 🔄 How Data Flows Through the Website

**Summary**

`Send` → `insert-word.php` → `getWords()` → `get-words.php` → `innerHTML` → Eye Button Style

When the eye button is clicked:

`toggleWords()` → 1. Toggle Status → 2. Call `getWords()` Again

**Details**

1. The user enters a word and clicks **Send**.

2. The word is sent to the `insert-word.php` file. In this file, the word is inserted into the database using an SQL `INSERT` statement, and then the page is reloaded.

3. The `getWords()` function in JavaScript is called. It sends a request to the `get-words.php` file, and the request does not include `POST`.

4. The `get-words.php` file checks the request and sees that it does not contain `POST`, so it does not execute the `if` statement, which means it does not perform the toggle. Instead, it executes the `SELECT` statement and retrieves the result from the database, which is either “all the words” or “nothing.”

5. The result is returned to the `getWords()` function, stored in the `output` variable, and displayed using `innerHTML`.

6. We are still inside the same `getWords()` function. The function now checks the result:
   - If the result is “nothing,” it adds a line over the eye button.
   - If the result is “all the words,” it displays the eye button without the line.

7. When the eye button is clicked, the `toggleWords()` function in JavaScript is called. It does two things:
   1. It sends a request with `POST` to `get-words.php`. The file then executes the `if` statement, which performs the toggle, and exits without executing the `SELECT` statement.
   2. It calls the `getWords()` function, whose role was explained above, to display the result. This means the result is displayed after the toggle. If the status becomes `0`, the words disappear, and if the status becomes `1`, all the words appear.

---
