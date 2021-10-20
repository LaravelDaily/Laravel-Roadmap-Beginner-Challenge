<template>
  <Head title="Log in" />

  <a-layout>
    <a-layout-content :style="{ height: '100vh' }">
      <a-row type="flex" justify="center" align="middle" style="height: 100vh">
        <a-col :span="8">
          <a-form
            :model="form"
            :label-col="{ span: 4 }"
            :wrapper-col="{ span: 14 }"
            :rules="rules"
          >
            <a-form-item
              required
              label="Email"
              name="email"
              :help="form.errors.email"
              :hasFeedback="form.errors.email ? true : false"
              :validateStatus="form.errors.email ? 'error' : 'validating'"
            >
              <a-input
                type="email"
                v-model:value="form.email"
                autocomplete="username"
                autofocus
              />
            </a-form-item>
            <a-form-item
              :help="form.errors.password"
              :hasFeedback="form.errors.password ? true : false"
              :validateStatus="form.errors.password ? 'error' : 'validating'"
              required
              name="password"
              label="Password"
            >
              <a-input
                v-model:value="form.password"
                autocomplete="current-password"
                type="password"
                :onPressEnter="submit"
              />
            </a-form-item>
          </a-form>
        </a-col>
      </a-row>
    </a-layout-content>
  </a-layout>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Head,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  setup() {
    const rules = {
      email: [
        { required: true, message: "Please enter your email address." },
        { type: "email", message: "Please enter a valid email address." },
      ],
      password: [
        { required: true, message: "Please enter your password." },
        { min: 6, message: "Your password must be at least 6 characters." },
      ],
    };

    const form = useForm({
      email: null,
      password: null,
      remember: false,
    });

    const submit = () => {
      form.post(route("login"), {
        onSuccess: () => {
          form.reset();
        },
      });
    };

    return { form, rules, submit };
  },
};
</script>
