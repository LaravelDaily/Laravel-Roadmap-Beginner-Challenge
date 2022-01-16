# Laravel Roadmap: Beginner Level Challenge

This is a task for the [Beginner Level of the Laravel Roadmap](https://github.com/LaravelDaily/Laravel-Roadmap-Learning-Path#beginner-level), with the goal to implement as many of its topics as possible.

This repository is intentionally empty, with only a Readme file. Your task if to submit a Pull Request with your version of implementing the task, and your PR may be reviewed by someone on our team, or other volunteers.

## The Task: Simple Personal Blog

You need to create a personal blog with just three pages:

- [x] Homepage: List of articles
- [x] Article page
- [x] Some static text page like "About me"


Also, there should be a Login mechanism (but no Register) for the author to write articles:

- [x] Manage (meaning, create/update/delete) categories
- [x] Manage tags
- [x] Manage articles
- For Auth Starter Kit, use [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind)
  or [Laravel UI](https://github.com/laravel/ui) (Bootstrap) - that starter kit will have some design, which is enough:
  the design is irrelevant for accomplishing the task


**DB Structure:**

- Article has title (required), full text (required) and image to upload (optional)
- Article may have only one category, but may have multiple tags


-----

## Futures Features to implement

- [ ] Add newsletters service
- [ ] Add a status column to the posts table to allow for posts that are still in a "draft" state. Only when this status
  is changed to "published" should they show up in the blog feed.
- [ ] Update the "Edit Post" page in the admin section to allow for changing the author of a post.
- [ ] Add an RSS feed that lists all posts in chronological order.
- [ ] Record/Track and display the "views_count" for each post.
- [ ] Convert form personnel Blog to Normal Blog, so anyone can register
- [ ] Allow users to create their posts.
- [ ] Allow registered users to "follow" certain authors. When they publish a new post, an email should be delivered to
  all followers.
- [ ] Allow registered users to "bookmark" certain posts that they enjoyed. Then display their bookmarks in a
  corresponding settings page.
- [ ] Add an account page to update your username and upload an avatar for your profile.
