Nth allows you to add a class to the nth element in a repeating set of channel entries. Simply wrap your {exp:channel:entries} tag in a {exp:nth} tag and use the class and interval parameters to designate the class name and nth index. In the following examples, every 4th <li> tag would be affected.

####Usage Examples

    {exp:nth class="last_one" interval="4"}
    <ul>
      {exp:channel:entries channel="some-content"}
      <li class="{nth}">{title}</li>
      {/exp:channel:entries}
    </ul>
    {/exp:nth}

Or alternatively,

    {exp:nth class=' class="last_one"' interval="4"}
    <ul>
      {exp:channel:entries channel="some-content"}
      <li {nth}>{title}</li>
      {/exp:channel:entries}
    </ul>
    {/exp:nth}

h1. Version History and Change Log

1.0.0 (2011-05-18) Initial release
